<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Hash
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
            'name'=>$dataRequest['username'],
            'email'=>$dataRequest['email'],
            'password'=>Hash::make($dataRequest['password']),

        ]);
        return view('customer.signup');
    }
}
