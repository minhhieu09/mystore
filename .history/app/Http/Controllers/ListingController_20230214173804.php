<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductsModel;


use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index(Request $request, $modelName) {
        $adminUser = Auth::guard('admins')->user();
        $data = ProductsModel::with('productcomponent.colors')->paginate(5);
        if($key = $request->key){
            $data = Pro
        }
        return view('admin.list.listing',[
            'user' => $adminUser,
            // 'records' => $records,
            'data'=> $data,

        ]);
    }
}
