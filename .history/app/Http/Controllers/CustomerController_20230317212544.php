<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function login(Request $request ){
        $data = $request->all();
        if(Auth::guard('web')::at){

        }
        // $customer = User::where('email', $data['email'])->get();
        return view('customer.login');
    }

    public function signup(Request $request){
        $dataRequest = $request->all();
        User::create([
            'first_name' => $dataRequest['username'],
            'name'=>$dataRequest['username'],
            'email'=>$dataRequest['email'],
            'password'=>Hash::make($dataRequest['password']),

        ]);
        return view('customer.login');
    }
}
