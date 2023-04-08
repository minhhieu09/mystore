<?php

namespace App\Http\Controllers;

use App\Models\Payment_model;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $Info = Payment_model::sum('total');
        return json->route('info.dashboard');
    }
}
