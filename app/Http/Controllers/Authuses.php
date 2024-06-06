<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Session; 
class Authuses extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        \DB::enableQueryLog();
        $credentials = $request->only('email','Admin_Password');
        $user = Admin::where('email', $request->Admin_Email)->first();

        if (!$user) {
            return response()->json(['error' => 'Email does not exist'], 401);
        }
    
        if (!Hash::check($request->Admin_Password, $user->Admin_Password)) {
            return response()->json(['error' => 'Invalid password'], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        // Authenticate the user
        Auth::login($user);
    
        // Create a session
        Session::regenerate();
    
        return response()->json([
            'message' => 'Authenticated successfully',
            'token'=>$token,
            'token_type'=>'Bearer',
    
    ], 200);
    }
}
