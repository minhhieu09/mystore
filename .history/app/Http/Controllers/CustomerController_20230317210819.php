<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function login(){
        return view('customer.login');
    }

    public function register(Request $request){
        $dataRequest = $request->all();
        dd($dataRequest);
        return view
    }
}
