<?php

namespace App\Http\Controllers;

use App\Models\ProductComponentModel;
use Illuminate\Support\Facades\DB;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    //
    public function Store()
    {
        $products = ProductsModel::all();


        return view('layouts.content', ['products' => $products]);
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

    public function Detail(Request $request , $id)
    {
        // Session::flush();
        $request = $request->id;
        $assign['product'] = ProductsModel::where('id', $id)->first();
        $assign['component'] = ProductComponentModel::all();
        $name = $assign['product']->name;
        
        // $name = $assign['product']->name;
        // $product_memory = $products->componentcolors;
        // dd($product_component);
        return view(
            'Cart.detail',$assign );
    }
    public function getmemory(Request $request){
        $dataRequest = $request->all();
        $memory = ProductComponentModel::where('product_id',$dataRequest['id'])->where('color_id',$dataRequest['color'])->get();
        
        return response()->json(['data'=> $memory]);

    }


    public function addcart(Request $request, $id)
    {
        $dataRequest = $request->all();
        $product = ProductsModel::find($dataRequest['id']);
        $component = ProductComponentModel::find($dataRequest['component']);

        $data = [
            'id' => $component->id,
            'name' => $component->name,
            'amount' => $component->amount,
            'color' => $component->color->name,
            'price' => $component->price,
            'memory' => $component->memory,
            'img' => $component->image,
            'time' => strtotime(now())


        ];
        
        // Session::flush();
        $data = [$id =>$request];
        // dd($request->session()->get('cart'));
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            $check = array_key_exists($id, $cart);
            if ($check) {
                $cart[$id]['amount'] += $request['amount'];
                $data = $cart ;
            } else {
                $data = $cart = $data;
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
