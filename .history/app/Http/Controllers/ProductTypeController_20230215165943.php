<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //

    public function index(){
        $data = $this->all();
        $type = $this->get
        return view('admin.product_type.index',['data' => $data]);
    }
}
