<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function verifyMail($token , $email){
        
        $EmailVerify = User::where('email', $email)->first();
        if($EmailVerify->emai_verified)
        return route('email.verify');
    }
}
