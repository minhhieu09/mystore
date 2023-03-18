<?php

namespace App\Http\Controllers;

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
            'password'=>$dataRequest['password']
        ])
        return view('customer.signup');
    }
}
