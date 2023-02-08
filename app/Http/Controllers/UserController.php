<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
     * Create an account
     */
    public function createAccount(SignupRequest $request){

        $token = Str::random(60);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'phone_code' => $request->phone_code,
            "phone_number" => $request->phone_number,
            'api_token' => hash('sha256', $token),
        ]);
        $data = [
            'user' => $user,
            'token' => $token,
            'message' => 'User account created successfully'
        ];
        return response()->json($data, 200);
    }

    public function updateAccount(Request $request){
        $user = $request->user();
        $user->update($request->all());
        $data = [
            'user' => $user,
            'message' => 'User account updated successfully'
        ];
        return response()->json($data, 200);
    }
}
