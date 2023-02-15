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

        $data = $request->only()
        
        
        if (Auth::guard('admins')->attempt($credentials)) {
        
            return "Dang nhap thanh cong";
        }else{
            
            return "Dang nhap k thanh cong";
        }
    }
}
