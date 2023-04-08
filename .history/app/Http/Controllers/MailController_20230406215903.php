<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function verifyMail($token , $email){
        User::where('email', $email)->first();
        return route('email.verify');
    }
}
