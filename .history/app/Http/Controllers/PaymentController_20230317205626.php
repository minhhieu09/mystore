<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function payment(Request $request){
        //check login
        if(!Auth::guard('web')->check())
    }
}
