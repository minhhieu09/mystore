<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index(Request $request, $modelName) {
        $adminUser = Auth::guard('admins')->user();
        $products = ProductModel::with('component.color')->paginate(5);
        return view('admin.list.listing',[
            'user' => $adminUser,
            // 'records' => $records,
            'products'=> $products

        ]);
    }
}
