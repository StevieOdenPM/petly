<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use App\Models\Courier;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::with('role')->get();
        if ($users) {
            return UserResource::collection($users);
        } else {
            return response()->json(['message' => 'No Record Available'], 200);
        }

        $user = $request->user();
        $role = Role::where('role_id', $user->role)->first();

        // Load role-specific details based on user role
        switch ($user->role) {
            case 'customer':
                $user->load('customerDetails');
                break;
            case 'admin':
                $user->load('adminDetails');
                break;
            case 'courier':
                $user->load('courierDetails');
                break;
        }

        return response()->json([
            'status' => true,
            'user' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = $request->user();
        Role::where('role_id', $user->role)->first();

        return response()->json([
            'status' => true,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $roleName = Role::where('role_id', $request->user()->role_id)->get('role_name');

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email' . Auth::user()->id,
            'username' => 'required',
            'phone_number' => 'required|numeric',
            'address' => Rule::requiredIf($roleName == 'customer'),
            'status' => Rule::requiredIf($roleName == 'courier'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "Validation Error",
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = $request->user();
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);
        $roleName = Role::where('role_id', $request->user()->role_id)->get('role_name');
        if ($roleName == 'customer') {
            Customer::where('user_id', $request->user()->user_id)->update([
                'phone_number' => $request->phone_number,
                'address' => $request->address
            ]);
        } elseif ($roleName == 'courier') {
            Courier::where('user_id', $request->user()->user_id)->update([
                'phone_number' => $request->phone_number,
                'status' => $request->status
            ]);
        }

        // $request->user()->customerDetails()->update([
        //     'phone_number' => $request->phone_number,
        //     'address' => $request->address
        // ]);

        return response()->json([
            'message' => 'Profile successfully updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->tokens()->delete();
            $user->delete();
            
            return response()->json([
                'status' => true,
                'message' => 'Successfully Deleted User'
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Delete User failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
