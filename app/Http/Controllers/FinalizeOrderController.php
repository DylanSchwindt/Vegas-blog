<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinalizeOrderController extends Controller
{
    public function __invoke(Request $request, Order $order){
        if( filled($order->finalized_at) ||
            filled($order->paid_at) ||
            filled($order->canceled_at) ||
            filled($order->voided_at)
        )
        {
           return response()->json([
                'status' => 'fail',
                'message' => 'Order cannot be Finalized.',
                'data' => []
            ], 403);
        }

        $order->update(['finalized_at' => Carbon::now()]);
        // Log Finalize step.

        return response()->json([
            'status' => 'success',
            'data' => [
                'order' => $order
            ]
        ]);
    }
}