<?php

namespace App\Http\Controllers;

use App\Models\Payment_model;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        Payment_model::all();
    }
}
