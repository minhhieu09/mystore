<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index(Request $request, $model) {
        $adminUser = Auth::guard('admins')->user();
        return view('admin.index',['user' => $adminUser]);
    }
}
