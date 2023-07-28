<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ChangeProfileController extends Controller
{
    public function changeProfile (ChangeProfileRequest $request, $id){
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->image = $request->input('image');
        $user->save();
        return response()->json(['success'=>true,'message' => 'User updated successfully', 'data' => $user], 200);
    }
}
