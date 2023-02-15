<?php

namespace App\Http\Controllers;

use App\Models\ProductTypeModel;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //

    public function index(Request $request){
        $data = ProductTypeModel::
        return view('admin.product_type.index',[
            

        ]);
    }
}
