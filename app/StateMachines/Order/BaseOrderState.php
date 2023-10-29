<?php


use App\Interfaces\OrderStateContract;

class BaseOrderState implements OrderStateContract
{
    public function __construct(public \App\StateMachines\Order\Order $order)
    {
    }

    function finalize() { throw new \App\StateMachines\Order\Exception(); }

    function pay() { throw new \App\StateMachines\Order\Exception(); }

    function void() { throw new \App\StateMachines\Order\Exception(); }

    function cancel() { throw new \App\StateMachines\Order\Exception(); }

    function refund() { throw new \App\StateMachines\Order\Exception(); }
}