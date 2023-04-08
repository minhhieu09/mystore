<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function verifyMail($token , $m){
        return route('email.verify');
    }
}
