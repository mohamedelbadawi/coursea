<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    private $model;
    public function __construct(Order $model)
    {
        $this->model = $model;
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Order $order, $data)
    {
        return $order->update($data);
    }
    public function getOrderByPaymentId($paymentId)
    {
        return $this->model->where('payment_id', $paymentId)->first();
    }
}
