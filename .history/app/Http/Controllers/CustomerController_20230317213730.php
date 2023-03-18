<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function login(Request $request ){
        $data = $request->only(['email', 'password']);
        // dd($data);
        if(Auth::guard('web')->attempt($data)){  
            return redirectroute('index');
        } else {
            return redirect('customer.login');
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
