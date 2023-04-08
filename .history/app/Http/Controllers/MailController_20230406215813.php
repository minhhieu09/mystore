<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function verifyMail($token ){
        return route('email.verify');
    }
}
