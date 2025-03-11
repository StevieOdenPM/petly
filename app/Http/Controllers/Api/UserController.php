<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
    public function index()
    {
        $users = User::get();
        if ($users) {
            return UserResource::collection($users);
        } else {
            return response()->json(['message' => 'No Record Available'], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $fields = $request->validate([
        //     'email' => 'required|unique:users,email'.Auth::user()->id,
        //     'username' => 'required',
        // ]);

        // $user = User::find(Auth::user()->id);
        // if (!$user) {
        //     return [
        //         'message' => 'The provided credentials are incorrect.',
        //         'data' => $user
        //     ];
        // }

        // $user->update($fields);

        // return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
