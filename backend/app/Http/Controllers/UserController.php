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
            // dd($user);
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'user' => new UserResource($user),
                'token' => $token
            ], 200);
        }
        return response()->json([
            'message' => 'Invalid credentials.'
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

    // list category --------------
    public function listCategory(){
        $categories = Auth::user()->store->categories;
        if ($categories ->count()> 0){
            // dd(CategoryResource::collection($categories));
            $listCategory = CategoryResource::collection($categories);
            return response()->json(["success"=>true, "data"=>$listCategory],200);
        }
        return response()->json(["success"=>false, "message" => "No category"],401);
        
    }
}
