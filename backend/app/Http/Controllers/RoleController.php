<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return response()->json(["success" => true, "data" => RoleResource::collection($roles), "message" => "Get all roles are successfully."], 200);
    }
}