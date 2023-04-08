<?php

namespace App\Http\Controllers;

use App\Models\Payment_model;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class DashboardController extends Controller
{
    
    public function InfoTotal(){
        $Info = Payment_model::sum('total');
        // dd(1);
        return response()->json(['data' => $Info]);
    }

    public function TotalUser(){
        $TotalUser = User::all('id')->sum();
        // dd($TotalUser);
        return response()->json(['id' => $TotalUser]);
    }

}
