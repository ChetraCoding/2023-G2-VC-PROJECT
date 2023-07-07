<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductCustomize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Auth::user()->store->products;
        $listproducts = ProductResource::collection($products);
        return response()->json(["success" => true, "data" => $listproducts, "message" => "Get all products success."], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $store_id = Auth::user()->store->id;
        $product = $request->all();

        $categoriesInStore = Auth::user()->store->categories;
        // loop ask category input have in store or not ----------
        foreach ($categoriesInStore as $categoryInStore) {
           
            if ($categoryInStore['id'] == $product['category_id']) {

                // loop ask barcode on each product, it already exist or not--------
                $productsInCategory = Auth::user()->store->categories[$product['category_id']-1]->products;
                foreach ($productsInCategory as $productInCategory) {
                    if (strtoupper($productInCategory['barcode']) == strtoupper($product['barcode'])) {
                        return response()->json(['success' => false, 'message' => ['barcode' => "The product's barcode already exists."]], 409);
                    }
                }
                // create new product -------------------
                $newProduct = [
                    'store_id' => $store_id,
                    'category_id' => $product['category_id'],
                    'name' => $product['name'],
                    'barcode' => $product['barcode'],
                    'description' => $product['description'],
                    'image' => $product['image'],
                    'is_active' => $product['is_active']
                ];
                $newProduct = Product::create($newProduct);
                // create product_customize for product ---------
                $productCustomizes = $product['product_customize'];
                foreach ($productCustomizes as $productCustomize) {
                    $newProductCustomize =[
                        'product_id' => $newProduct['id'],
                        'size' => $productCustomize['size'],
                        'price' => $productCustomize['price'],
                        'quantity' => $productCustomize['quantity']
                    ];
                    $newProductCustomize = ProductCustomize::create( $newProductCustomize);
                }
                return response()->json(['success'=>true, 'data' => new ProductResource($newProduct), 'message'=>"You have created new product."],200);
            }
        }
        // return error response if category not found
        return response()->json(['success' => false, 'message' => "The category id " . $product['category_id'] . " does not exist."], 404);
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
