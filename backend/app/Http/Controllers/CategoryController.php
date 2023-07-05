<?php

namespace App\Http\Controllers;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // list category --------------
    public function index()
    {
        $categories = Auth::user()->store->categories;
        if ($categories ->count()> 0){
            // dd(CategoryResource::collection($categories));
            $listCategory = CategoryResource::collection($categories);
            return response()->json(["success"=>true, "data"=>$listCategory],200);
        }
        return response()->json(["success"=>false, "message" => "No category"],401);
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
