<?php

namespace App\Http\Controllers;

class PayOrderController extends Controller
{
    public function __invoke(Request $request, Order $order){
        if(blank($order->finalized_at) ||
            filled($order->paid_at) ||
            filled($order->canceled_at) ||
            filled($order->voided_at)
        ) {
            abort(403, 'Order cannot be paid.');
        }

        // Run Payment Information / Token through Payment Processor
        $transaction = ...;
        $order->update([
            'paid_at' => Carbon::now(),
            'processing_status' => $transaction->status
        ]);

        Mail::send(new OrderConfirmation($order));

        return view('order.thanks', ['order' => $order]);
    }
}