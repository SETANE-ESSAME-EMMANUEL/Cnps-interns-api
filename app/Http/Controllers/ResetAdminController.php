<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use Otp;
use Hash;
class ResetAdminController extends Controller
{
    public $otp;
    public function __construct(){
        $this->otp=new Otp;
    }
    //
    public function passwordReset(ResetPasswordRequest $request){
        $Otp=$this->otp->validate($request->email,$request->otp);
        if(!$Otp->status){
            return response()->json(['error'=> $Otp],401);
       }else{
           $user=Admin::Where('email',$request->email)->first();
           $user->Update([ 'Admin_Password'=>Hash::make($request->Admin_Password)]);
        
           $success['success']=true;
           return response()->json($success ,200);
       }

    }
   
}
