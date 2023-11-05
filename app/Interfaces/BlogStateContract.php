<?php

namespace App\Interfaces;

interface BlogStateContract
{
    function draft();
    function scheduled();

    function published();

}