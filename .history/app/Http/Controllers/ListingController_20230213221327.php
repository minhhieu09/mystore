<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index(Request $request, $modelName) {
        $product = \App\Models.$modelName::paginate(1);
        $adminUser = Auth::guard('admins')->user();
        return view('admin.list.listing',['user' => $adminUser]);
    }
}