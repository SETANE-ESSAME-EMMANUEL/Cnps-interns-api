<?php

namespace App\Http\Controllers;
use App\Notifications\AdminReset;
use App\Models\Admin;
use Otp;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
class ForgotPasswordController extends Controller
{
        public function forgotPassword(ForgotPasswordRequest $requets){
            $input=$requets->only('email');
            $user=Admin::where('email',$input)->first();
            $user->notify(new AdminReset());
            $success['success']=true;
            return response()->json($success,200);
      
          }
}
