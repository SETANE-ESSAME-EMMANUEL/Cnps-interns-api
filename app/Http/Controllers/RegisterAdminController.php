<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegsterAdminRequest;
use App\Models\Admin;


class RegisterAdminController extends Controller
{
    public function createAdmin(RegsterAdminRequest $request){
      
        // Create a new Admin (Supervisor) instance
        $user = Admin::create([
            'Admin_Id' => $request->Admin_Id,
            'Admin_Name' => $request->Admin_Name,
            'Admin_Surname' => $request->Admin_Surname,
            'Admin_Phone' => $request->Admin_Phone,
            'Admin_Email' => $request->Admin_Email,
            'Admin_Type' => 'Supervisor', // Assuming this is a fixed value
            'Admin_Password' => Hash::make($request->Admin_Password),
        ]);
        if (!$user) {
            return response()->json(['success' => false, 'message' =>'Admin not created']);
            
        }

        // Fire the Registered event
      

        // Log the user in
        Auth::login($user);

        // Return a success response
        return response()->json(['success' => true], 200);
  

        // Return an error response with detailed message

    
}
}
