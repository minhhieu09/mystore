<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if (Auth::guard('admin')->attempt($credentials)) {
            echo "Dang nhap thanh cong";
        }else{
            echo "Dang nhap khong dung"        }
    }
}
