<?php

namespace App\Http\Controllers;
use 
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function verifyMail(){
        return route('email.verify');
    }
}
