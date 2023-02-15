<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        return view('admin.index');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        dd
        if (Auth::guard('admin')->attempt($credentials)) {
            dd(1);
            return "Dang nhap thanh cong";
        }else{
            dd(2);
            return "Dang nhap k thanh cong";
        }
    }
}
