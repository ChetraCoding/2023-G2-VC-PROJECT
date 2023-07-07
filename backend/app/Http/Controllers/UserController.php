<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // user login ----------------

    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'user' => new UserResource($user),
                'token' => $token
            ], 200);
        }
        return response()->json([
            'message' => 'Invalid email and password.'
        ], 401);
    }
    // user logout ---------------

    public function logout(Request $request)
    {
        // The user is logged in, delete their tokens
        $request->user()->tokens()->delete();
        // Return a success JSON response
        return response()->json(['message' => 'Logged out successfully.'], 200);
    }
}
