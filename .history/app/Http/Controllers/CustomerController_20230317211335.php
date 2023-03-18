<?php

namespace App\Http\Controllers;
use 
use App\Models\UserModel;
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
            'name'=>$dataRequest['name'],
            'email'=>$dataRequest['email'],
            'password'=>Hash::make($dataRequest['password']),

        ]);
        return view('customer.signup');
    }
}
