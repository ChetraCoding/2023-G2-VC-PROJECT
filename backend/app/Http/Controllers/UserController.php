<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login(LoginUserRequest $request){
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user);
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'user' => new UserResource($user),
                'token' => $token
            ],200);
        }
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }
}
