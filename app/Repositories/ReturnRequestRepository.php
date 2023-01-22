<?php

namespace App\Repositories;

use App\Models\Order;

class ReturnRequestRepository
{
    public function returnRequest()
    {
        return Order::with('user')
            ->select('id', 'status_code', 'total', 'user_id', 'return_status')
            ->where('return_status', 1)
            ->paginate(10);
    }

    public function returnRequestAccept($id)
    {
        $order = Order::find($id);
        $order->return_status = 2;
        $order->update();
    }

    public function returnAcceptAll()
    {
        return Order::with('user')
            ->select('id', 'status_code', 'total', 'user_id', 'return_status')
            ->where('return_status', 2)
            ->paginate(10);
    }

    public function returnRequestCancel($id)
    {
        $order = Order::find($id);
        $order->return_status = 3;
        $order->update();
    }

    public function returnCancelAll()
    {
        return Order::with('user')
            ->select('id', 'status_code', 'total', 'user_id', 'return_status')
            ->where('return_status', 3)
            ->paginate(10);
    }
}
