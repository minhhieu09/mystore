<?php

namespace App\Http\Controllers;

use App\Models\ProductComponentModel;
use App\Models\ProductsColorModel;
use Illuminate\Support\Facades\DB;
use App\Models\ProductsModel;
use App\Models\ProductTypeModel;
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
    public function Watches(Request $request)
    {
        $productType = ProductTypeModel::all();
        $priceType = [
            '1' => 'Dưới 5 triệu',
            '2' => '5 - 10 triệu',
            '3' => '10 - 15 triệu',
            '4' => 'Trên 15 triệu',
        ];
        $input = $request->all();
        $product = [];
        if (!empty($input)) {

            if ($input['product_name'] == null && $input['price'] == null) {
                $product = ProductsModel::all();
            } elseif ($input['product_name'] != null && $input['price'] == null) {
                $product = ProductsModel::where('type', '=', $input['product_name'])->get();
            } elseif ($input['product_name'] == null && $input['price'] != null) {
                $product = $this->searchPrice($input);
            } else {
                $productByPrice = $this->searchPrice($input);
                $product = $productByPrice->where('type', '=', $input['product_name']);
            }
        }
        $data = ProductsModel::all();
        dd($data->key);
        if ($key = $request->key) {
            $data = ProductsModel::orderBy('id', 'DESC')->where('name', 'like', '%' . $key . '%')->paginate(5);
        }
     
        return view('layouts.watches', ['data'=>$data, 'productType' => $productType, 'priceType' => $priceType, 'product' => $product]);
    }
    public function Contact()
    {
        return view('layouts.contact');
    }
    public function About()
    {
        return view('layouts.about');
    }
    public function cart()
    {
        $session = Session::has('cart') ? Session::get('cart') : null;
        return view('Cart.cart', ['data' => $session]);
    }


    public function getCartSession()
    {
        if (Session::has('cart')) {
            return response()->json(Session::get('cart'));
        }
        return response()->json();
    }

    public function Detail(Request $request, $id)
    {
        // Session::flush();
        $request = $request->id;
        $assign['product'] = ProductsModel::where('id', $id)->first();
        $assign['component'] = $assign['product']->productcomponent->first();
        $name = $assign['product']->name;
        $assign['sameProduct'] = ProductsModel::where('id', '!=', $id)->where('type', $assign['product']->type)->where('status', 1)->take(4)->get();
        // $name = $assign['product']->name;
        $data = ProductComponentModel::where('product_id', $assign['product']->id)->get();
        $colorIds = array_unique($data->pluck('color_id')->toArray());
        $assign['color'] = ProductsColorModel::whereIn('id', $colorIds)->get();
        // $product_memory = $products->componentcolors;
        // dd($product_component);
        return view(
            'Cart.detail',
            $assign
        );
    }
    public function getmemory(Request $request)
    {
        $dataRequest = $request->all();
        $memory = ProductComponentModel::where('product_id', $dataRequest['id'])->where('color_id', $dataRequest['color'])->get();

        return response()->json(['data' => $memory]);
    }


    public function addcart(Request $request)
    {
        $dataRequest = $request->all();
        $product = ProductsModel::find($dataRequest['id']);
        $component = ProductComponentModel::find($dataRequest['component']);

        $data = [
            'id' => $component->id,
            'name' => $component->name,
            'amount' => $dataRequest['amount'],
            'color' => $component->colors->name,
            'price' => $component->price,
            'memory' => $component->memory,
            'img' => $component->image,
            'time' => strtotime(now())


        ];

        // Session::flush();
        $idcomponent = $component->id;
        $data2 = [$idcomponent => $data];
        // dd($request->session()->get('cart'));
        if (Session::has('cart')) {
            $session = Session::get('cart');
            if (array_key_exists($idcomponent, $session)) {
                $session[$idcomponent]['amount'] += $data['amount'];
                $data2 = $session;
            } else {
                $data2 = $session +  $data2;
            }
        }
        uasort($data2, function ($a, $b) {
            return $a['time'] < $b['time'] ? 1 : -1;
        });

        Session::put('cart',  $data2);
        // dd($data);
        return response()->json(['data' => Session::get('cart')]);
    }

    public function searchPrice($input)
    {
        switch ($input['price']) {
            case "1":
                $start = 0;
                $end = 5000000;
                break;
            case "2":
                $start = 5000000;
                $end = 10000000;
                break;
            case "3":
                $start = 10000000;
                $end = 15000000;
                break;
            case "4":
                $start = 15000000;
                $end = 100000000;
                break;
            default:
                $start = 0;
                $end = 5000000;
        }

        $product = ProductsModel::whereHas('productcomponent', function ($query) use ($start, $end) {
            $query->where('price', '>=', $start)
                ->where('price', '<', $end);
        })->get();
        return $product;
    }

    public function searchProducts(Request $request)
    {
        $data = ProductsModel::all()->paginate(5);
        dd($data->key);
        if ($key = $request->key) {
            $data = ProductsModel::orderBy('id', 'DESC')->where('name', 'like', '%' . $key . '%')->paginate(5);
        }
        return view('index.watches',['data' => $data]);
    }
}
