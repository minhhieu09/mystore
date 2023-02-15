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

        $product_component = ProductComponentModel::where('product_id', $request)->get();
        // $product_memory = $products->componentcolors;
        // dd($product_component);
        return view(
            'Cart.detail',
            [
                // 'detail' => $products,
                // 'detail_colors' => $products_color,
                'detail_component' => $product_component,
            ]
        );
    }
    public function getmemory(Request $request){
        $memorys = ProductComponentModel::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        return response()->json(['data'=>$memory]);
        if($request->ajax()){
            $output = '';
            if($memorys){
                foreach ($memorys as $key => $memory){
                    $output .= '<tr>
                        <td>''</td>
                        <td>''</td>
                        <td>''</td>
                        <td>''</td>
                        <td>''</td>
                        <td>''</td>
                        <td></td>
                    </tr>';
                }
            }
        }

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
