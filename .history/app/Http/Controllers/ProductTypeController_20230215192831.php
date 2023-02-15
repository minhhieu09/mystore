<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //

    public function index(Request $request){
        
        return view('admin.product_type.index',[
            

        ]);
    }
}
