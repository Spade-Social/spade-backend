<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class UserController extends Controller
{

    /**
     * Check if an account exist using an email
     */
    public function checkEmailAccount(Request $request){
        $account_exists = User::where('email', $request->email)->count() > 0;
        $data = [
            'account_exists' => $account_exists,
            'message' => "Email account status retrieved successfully"
        ];
        return response()->json($data, 200);
    }

    /**
     * 
     */
    public function signup(SignupRequest $request){
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);
        $data = [
            'user' => $user,
            'message' => 'User account created successfully'
        ];
        return response()->json($data, 200);
    }
}
