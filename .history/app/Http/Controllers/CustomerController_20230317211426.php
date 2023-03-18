<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function login(){
        return view('customer.login');
    }

    public function signup(Request $request){
        $dataRequest = $request->all();
        User::create([
            'username'=>$dataRequest['username'],
            'email'=>$dataRequest['email'],
            'password'=>Hash::make($dataRequest['password']),

        ]);
        return view('customer.signup');
    }
}
