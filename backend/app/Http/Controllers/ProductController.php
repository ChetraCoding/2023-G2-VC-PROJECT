<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\ShowProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCustomize;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Auth::user()->store->products->sortByDesc('id');
    return response()->json(["success" => true, "data" => ShowProductResource::collection($products), "message" => "Get all products successfully."], 200);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreateProductRequest $request)
  {
    $categoriesInStore = Auth::user()->store->categories;
    $checkCategory = $categoriesInStore->where('id', $request->category_id)->first();
    if ($checkCategory) {
      // Loop ask barcode on each product, it already exist or not--------
      $productsInStore = Auth::user()->store->products;
      $checkBarcode = $productsInStore->where('barcode', $request->barcode)->first();
      if ($checkBarcode) {
        return response()->json(['success' => false, 'message' => ['barcode' => "The product's barcode already exists."]], 409);
      }
      // Create new product -------------------
      $newProduct = Product::storeProduct($request);

      // Create product_customize for product ---------
      $productCustomizes = $request->product_customizes;
      foreach ($productCustomizes as $productCustomize) {
        $productCustomize['product_id'] = $newProduct['id'];
        ProductCustomize::store($productCustomize);
      }
      return response()->json(['success' => true, 'data' => new ShowProductResource($newProduct), 'message' => "You have created new product sucessfully."], 200);
    }
    // Return error response if category not found
    return response()->json(['success' => false, 'message' => "The category id " . $request->category_id . " does not exist."], 404);
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CreateProductRequest $request, $productId)
  {
    $productContains = Auth::user()->store->products->contains($productId);
    if (!$productContains) return response()->json(["success" => false, "message" => ["product" => "You don't have any product with an id $productId"]], 404);
    $categoryContains = Auth::user()->store->categories->contains($request->input('category_id'));
    if (!$categoryContains) return response()->json(['success' => false, 'message' => ["category" => "The category id " . $request->input('category_id') . " does not exist."]], 404);

    $productsInCategory = Category::find($request->input('category_id'))->products->whereNotIn('id', [$productId]);
    foreach ($productsInCategory as $productInCategory) {
      if (strtoupper($productInCategory->barcode) === strtoupper($request->input('barcode'))) {
        return response()->json(['success' => false, 'message' => ['barcode' => "The product's barcode already exists."]], 409);
      }
    }

    // Update the product attributes
    $product = Product::storeProduct($request, $productId);

    // Update the product_customize relationship
    foreach ($request->product_customizes as $customize) {
      if (isset($customize['product_customize_id'])) {
        $id = $customize['product_customize_id'];
        $customizesFromDB = $product->productCustomize;
        if ($customizesFromDB->where('id', $id)->first()) {
          $customize['product_id'] = $productId;
          ProductCustomize::store($customize, $id);
        } else {
          return response()->json(['success' => false, 'message' => ["product_customize" => "The product_customize id " . $id . " does not exist in product id " . $productId . '.']], 409);
        }
      } else {
        $customize['product_id'] = $productId;
        ProductCustomize::store($customize);
      }
    }
    return response()->json(['success' => true, 'data' => new ShowProductResource($product), 'message' => ["product" => "The product has been updated successfully."]], 200);
  }



  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    //
  }
}
