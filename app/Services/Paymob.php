<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Paymob
{
    private $orderRepository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function getIframe($courseData, $billingData, $price, $order)
    {
        $token = $this->getToken();
        // send data to
        $getOrder = $this->createOrder($courseData, $token, $price);
        $this->orderRepository->update($order, ['payment_id' => $getOrder->id]);
        // get payment token
        $paymentToken = $this->getPaymentToken($billingData, $getOrder, $token, $price);
        return \Redirect::away('https://portal.weaccept.co/api/acceptance/iframes/' . env('PAYMOB_IFRAME_ID') . '?payment_token=' . $paymentToken);
    }

    public function getToken()
    {
        $response = Http::post('https://accept.paymob.com/api/auth/tokens', [
            'api_key' => env('PAYMOB_API_KEY')
        ]);
        return $response->object()->token;
    }

    public function createOrder(array $courseData, $token, $price)
    {
        //course data should include name ,, amount
        //required for the request
        //token,amount,delivery

        $items = [[
            "name" => $courseData['name'],
            "description" => $courseData['description'],
            "quantity" => 1,
            "amount_cents" => $price,
        ]];
        $data = [
            'auth_token' => $token,
            'amount_cents' => $price,
            'description' => $courseData['description'],
            'currency' => 'EGP',
            'items' => $items
        ];
        $response = Http::post('https://accept.paymob.com/api/ecommerce/orders', $data);
        return $response->object();
    }


    public function getPaymentToken($billingData, $order, $token, $amount)
    {
        $data = [
            'auth_token' => $token,
            'amount_cents' => $amount,
            'expiration' => 3600,
            'order_id' => $order->id,
            'billing_data' => $billingData,
            'currency' => "EGP",
            'integration_id' => env('PAYMOB_INTEGRATION_ID')
        ];
        $response = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', $data);
        return $response->object()->token;
    }



    public function callback(Request $request)
    {
        $data = $request->all();
        ksort($data);
        $hmac = $data['hmac'];
        $array = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success',
        ];
        $connectedString = '';
        foreach ($data as $key => $element) {
            if (in_array($key, $array)) {
                $connectedString .= $element;
            }
        }
        $secret = env('PAYMOB_HMAC');
        $hased = hash_hmac('sha512', $connectedString, $secret);
        if ($hased == $hmac) {

            return true;
        }
        return false;
    }
}
