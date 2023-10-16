<?php

namespace App\Interfaces;

interface OrderStateContract
{
    function finalize();
    function pay();
    function void();
    function cancel();
    function refund();

}