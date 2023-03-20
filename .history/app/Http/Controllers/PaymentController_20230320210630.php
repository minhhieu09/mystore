<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment_model;
use Illuminate\Contracts\Session\Session;

class PaymentController extends Controller
{
    //
    public function payment(Request $request){
        // check login
        if(!Auth::guard('web')->check()){
            return redirect()->to(route('customer.signup'));
        }
        $dataRequest = $request->all();
        // dd($dataRequest);
        // check item
        if(empty($dataRequest['component'])){
            return redirect()->route('index.store');
        }

        // Save payment to db
        $paymentInfo = [];
        foreach($dataRequest['component'] as $key => $value){
            $paymentInfo[]=[
                'component' => $value,
                'amount'    => $dataRequest['amount'][$key],
                'product_name' => $component->product->name,
                'memory' => $component->memory,
                'color' => $component->color->name,
                'price' => $component->price,
                
            ];
        }
        $data = [
            'customer_id' => Auth::guard('web')->user()->id,
            'payment_info'=>json_encode($paymentInfo),
            'total' => $dataRequest['total'],
        ];
        // dd($data);
        Payment_model::create($data);
        session()->forget('cart');

        return back()->with(['status' => 'success', 'message' => 'Thanh toan thanh cong']);
    }

    

    
}
