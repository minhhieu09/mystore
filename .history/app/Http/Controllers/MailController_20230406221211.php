<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function verifyMail($token , $email){
        
        $EmailVerify = User::where('email', $email)->first();
        if($EmailVerify->token == $token){
            $EmailVerify->status = 1;
            $EmailVerify->save();
        }
        return redirect()->back()->with(['status' => 'success', 'message' => 'Verify email thành công']);
    }
}
