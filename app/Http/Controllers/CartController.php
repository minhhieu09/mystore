<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function Cart(Request $request){
        $data = $request->session()->get('cart');
        return view('Cart.cart',['data'=>$data]);
    }

}
