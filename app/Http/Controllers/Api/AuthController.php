<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'username' => 'required|max:255|string',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users',
        ]);

        $fieldsCustomer = $request->validate([
            'phone_number' => 'required|size:12',
            'address' => 'nullable|size:255'
        ]);

        $user = User::create($fields);
        $customer = $user->customerDetails()->create($fieldsCustomer);
        
        $token = $user->createToken($request->username);

        return [
            'user' => [
                'username' => $user->username,
                'email' => $user->email,
                'role' => $customer,
            ],
            'token' => $token->plainTextToken
        ];
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'The provided credentials are incorrect.'
            ];
        }

        $token = $user->createToken($user->username);


        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }
    
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You are logged out.'
        ];
    }
}
