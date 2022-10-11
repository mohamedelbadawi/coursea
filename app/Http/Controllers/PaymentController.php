<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Services\Paymob;

class PaymentController extends Controller
{
    protected $paymob, $orderRepository;

    public function __construct(Paymob $paymob, OrderRepositoryInterface $orderRepository)
    {
        $this->paymob = $paymob;
        $this->orderRepository = $orderRepository;
    }
    public function creditPayment(Course $course)
    {
        // dd($course);
        // create order with pending

        $courseData['name'] = $course->title;
        $courseData['description'] = $course->description;
        $courseData['id'] = $course->id;
        $billingData = [
            "apartment" => "NA",
            "email" => auth()->user()->email,
            "floor" => "Na",
            "first_name" => auth()->user()->name,
            "street" => "Na",
            "building" => "NA",
            "phone_number" => "01023166866",
            "shipping_method" => "NA",
            "postal_code" => "NA",
            "city" => "NA",
            "country" => "Na",
            "last_name" => "NA",
            "state" => "NA"
        ];

        $order = $this->orderRepository->create(['user_id' => auth()->id(), 'course_id' => $course->id, 'amount' => $course->price, 'status' => 'pending']);
        $price = $course->price * 100;
        return $this->paymob->getIframe($courseData, $billingData, $price, $order);
    }


    public function creditCallback(Request $request)
    {

        if ($this->paymob->callback($request)) {
            $order = $this->orderRepository->getOrderByPaymentId($request->order);
            if ($request->success == "true") {
                $this->orderRepository->update($order, ['status' => 'approved']);
                return redirect()->route('student.dashboard')->with(['success' => 'Course purchased Success']);
            } else {
                $this->orderRepository->update($order, ['status' => 'canceled']);
                return redirect()->route('student.dashboard')->with(['error' => 'Error occurred ']);
            }
        }
        return redirect()->route('student.dashboard')->with(['error' => 'there is an secure payment']);
    }
}
