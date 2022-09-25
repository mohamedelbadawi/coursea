<?php

namespace App\Repositories;

use App\Models\Order;

interface OrderRepositoryInterface
{

    public function create(array $data);
    public function update(Order $order, $data);
    public function getOrderByPaymentId($paymentId);
}
