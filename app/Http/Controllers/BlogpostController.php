<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    //

    public function store(SubmitOrderRequest $request){
        Order::create($request->validate());
    }
}
