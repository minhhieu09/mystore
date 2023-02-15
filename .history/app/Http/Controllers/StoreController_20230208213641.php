<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    //
    public function Store()
    {
        $product = ProductsModel::all();
        return view('layouts.content', ['product' => $product]);
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

    public function Detail(Request $request)
    {
        // Session::flush();
        $request = $request->id;
        // $products = DB::table('products')->where('id', $request)->with('colors')->first();
        $products = ProductsModel::where('id', $request)->first();
        $products_color = $products->productscolor;
        $product_component = $products->productcomponent;
        $product_memory = $products->componentcolors;
        // dd($product_memory);
        return view(
            'Cart.detail',
            [
                'detail' => $products,
                'detail_colors' => $products_color,
                'detail_component' => $product_component,
            ]
        );
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
