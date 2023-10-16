<?php

class ClosedOrderState implements \App\Interfaces\OrderStateContract{
    function finalize() {}

    function pay() {}

    function void() {}

    function cancel() {}

    function refund() {}
}