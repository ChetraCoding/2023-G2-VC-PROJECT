<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
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
            $listCategory = CategoryResource::collection($categories);
            return response()->json(["success"=>true, "data"=>$listCategory],200);
        }
        return response()->json(["success"=>false, "message" => "No category"],401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $storeId = Auth::user()->store_id;
        // get name category from input
        $nameCategory = $request->all()['name'];
        // get all categories in store of
        $categoriesInStore = Auth::user()->store->categories;
        // Check if the category already exists in the store,it'll return error message .
        foreach ( $categoriesInStore as $category){
            if(strtoupper($category->name) == strtoupper($nameCategory)){
                return response()->json(['success' => false,'message' => "The category already exists."],409);
            }
        };
        $newCategory = ['store_id'=>$storeId,"name"=> $nameCategory];
        $category = Category::create($newCategory);
        $category = new CategoryResource($category);
        return response()->json(['success'=>true, 'data' => $category, 'message'=>"You have created new category.", 'status' => 200]);

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
