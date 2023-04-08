<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use App\Models\Address_model;

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
        $token = time();
        $user = User::create([
            'first_name' => $dataRequest['username'],
            'name' => $dataRequest['username'],
            'email' => $dataRequest['email'],
            'password' => Hash::make($dataRequest['password']),
            'token' => $token,

        ]);

        Mail::to($dataRequest['email'])->send(new VerifyMail($token,$dataRequest['email'])); 
        // dd($user);

        return redirect()->back()->with(['status' => 'fail', 'message' => 'Bạn cần Verify Email của bạn']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        // dd(Auth::guard('web')->check());
        return view('customer.login');
    }

    public function customerInfo()
    {
        $customer = Auth::guard('web')->user();
        // dd($customer);
        $address = Address_model::all();
        $city = DB::table('address_models')->select('city_id','city_name')->groupBy('city_id')->get();
        // dd($city);
        return view('customer.info',[
            'address' => $address,
            'customer' => $customer,
            'city' => $city,
        ]);
    }

    public function InfoAddress(Request $request){
        $cityId = $request->city_id;
        $district = Address_model::where('city_id' ,$cityId)->get();
        return response()->json([
            'data' => $district 
        ]);
    }

    public function Info(Request $request){
        $dataRequest = $request->all();
        dd($dataRequest);
    }
}
