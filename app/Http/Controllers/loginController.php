<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class loginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $response = Http::post('http://petly.test:8080/api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($response->successful()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login via external API successful',
                    'data' => $response->json()
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'External API login failed',
                    'error' => $response->body(),
                ], $response->status());
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Request to external API failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
