<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    //
    public function Store()
    {
        $product = products::all();
        dd($product);
        return view('layouts.content');
    }
    public function Watches()
    {
        return view('layouts.watches');
    }
    public function Contact()
    {
        return view('layouts.contact');
    }
    public function About()
    {
        return view('layouts.about');
    }

    public function Detail()
    {
        // Session::flush();

        return view('Cart.detail');
    }


    public function addcart(Request $request)
    {
        // Session::flush();

        // dd($request->session()->get('cart'));
        if (Session::has('cart')) {
            $id = $request->id;
            $cart = Session::get('cart');
            $check = array_key_exists($id, $cart);
            if ($check) {
                $cart[$id]['amount'] += 1;
            } else {
                $cart[$request->id] = [
                    "amount" => 1,
                    "price" => $request->price,
                    "name" => $request->name,
                ];
                // $cart= array_merge($cart,$new);
            }
            Session::put('cart', $cart);
        } else {
            $data[$request->id] = [
                "amount" => 1,
                "price" => $request->price,
                "name" => $request->name,
            ];
            Session::put('cart', $data);
        }

        // dd($data);
        return response()->json(['data' => Session::get('cart')]);
    }
}
