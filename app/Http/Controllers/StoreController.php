<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function Store(){
        return view('layouts.content');
    }
    public function Watches(){
        return view('layouts.watches');
    }
    public function Contact(){
        return view('layouts.contact');
    }
    public function About(){
        return view('layouts.about');
    }

    public function Detail(){
        return view('Cart.detail');
    }

    public function addcart(Request $request){
        // $request->session()->flush();
        // dd($request->session()->get('cart'));
        if($request->session()->has('cart')){
            $id = $request->id;
            $cart = $request->session()->get('cart');
            $check = array_key_exists($id, $cart);
            if($check){
                $cart[$id]['amount'] += 1 ;
            }
            else{
                $cart[$request->id] = [
                    "amount" => 1,
                    "price" => $request->price,
                    "name" => $request->name,
                ];
                // $cart= array_merge($cart,$new);
            }
            $request->session()->put('cart',$cart);

        }
        else{
            $data[$request->id] = [
                "amount" => 1,
                "price" => $request->price,
                "name" => $request->name,
            ];
            $request->session()->put('cart',$data);
            
        }

        // dd($data);
        return response()->json(['data' =>$request->session()->get('cart')]);
    }
}
