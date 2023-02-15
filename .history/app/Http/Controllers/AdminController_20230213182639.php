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

        $data = $request->only(['email', 'password']);
        
        
        if (Auth::guard('admins')->attempt($data)) {
        
            return view('admin.index');
        }else{
            
            return redirect('admin/login');
        }
    }

    public function logout(){
        Auth::guard('admins')->
    }
}
