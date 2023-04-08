<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    //
    public function loginCustomer(){
        return view('customer.login');
    }
    public function login(Request $request)
    {
        $data = $request->only(['email', 'password']);
        // dd($data);
        // $customer = Auth::guard('web')->attempt($data);
        // dd($customer);
        if (Auth::guard('web')->attempt($data)) {
            return redirect()->route('index.store');
        } else {
            return redirect()->back()->with(['status' => 'fail', 'message' => 'Đăng nhập thất bại']);
        }


        // $customer = User::where('email', $data['email'])->get();
        // return view('customer.login');
    }

    public function signup(Request $request)
    {
        $dataRequest = $request->all();
        $user = User::create([
            'first_name' => $dataRequest['username'],
            'name' => $dataRequest['username'],
            'email' => $dataRequest['email'],
            'password' => Hash::make($dataRequest['password']),

        ]);

        Mail::send(new)
        // dd($user);

        return view('customer.login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        // dd(Auth::guard('web')->check());
        return view('customer.login');
    }

    public function customerInfo()
    {
        return view('customer.info');
    }
}
