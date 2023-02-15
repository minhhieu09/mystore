<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashboard(){
        return view ('admin.index');
    }

    public function loginPost(Request $request){
        var_dump($request)
    }
}
