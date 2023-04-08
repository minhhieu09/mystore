<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductsModel;


use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index(Request $request) {
        $adminUser = Auth::guard('admins')->user();
        $data = ProductsModel::with('productcomponent.colors')->paginate(5);
        $data = $data->appends($request->all());
        if($key = $request->key){
            $data = ProductsModel::orderBy('id','DESC')->where('name','like','%' . $key.'%')->paginate(5);
        }
        return view('admin.list.listing',[
            'user' => $adminUser,
            // 'records' => $records,
            'data'=> $data,

        ]);
    }
    public function detailProduct(Request $request){
        $adminUser = Auth::guard('admins')->user();
        $data = ProductsModel::whereHas('productcomponent', function ($q) {
            $q->where('amount', '<=', 3);
        })
        ->paginate(5);
        $data = $data->appends($request->all());
        if($key = $request->key){
            $data = ProductsModel::orderBy('id','DESC')->where('name','like','%' . $key.'%')->paginate(5);
        }
        
        return view('admin.Product Soled.detail',[
            'user' => $adminUser,
            // 'records' => $records,
            'data'=> $data,

        ]);
    }
}
