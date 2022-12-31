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
}
