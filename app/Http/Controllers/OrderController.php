<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController
{
    public function store(CreateOrderRequest $request){
        $order = Order::create($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => [
                'order' =>  $order
            ]
        ]);
    }

    public function update(UpdateOrderRequest $request, Order $order){
        if(filled($order->paid_at) || filled($order->finalized_at)){
            return response()->json([
                'status' => 'fail',
                'message' => 'Order cannot be updated',
                'data' => []
            ], 403);
        }

        $order->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Order Updated Successfully.',
            'data' => [
                'order' => $order
            ]
        ]);
    }
}