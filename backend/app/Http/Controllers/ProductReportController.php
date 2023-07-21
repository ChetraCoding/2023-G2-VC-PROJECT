<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReportController extends Controller
{
    /**
     * Get product report by month and year.
     */
    public function productReport($month, $year)
    {
        // Test ============
        return response(
            Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->join('product_customizes', 'order_details.product_customize_id', '=', 'product_customizes.id')
                ->join('products', 'product_customizes.product_id', '=', 'products.id')
                ->whereYear('datetime', '=', $year)
                ->whereMonth('datetime', '=', $month)->get()
                // ->get()
                ->groupBy('product_id')
            // ->sum('order_details.quantity')
        );
        // =============
        // Check the user permission
        // if (!User::roleRequired('restaurant_owner')) {
        //     return response()->json(['success' => false, 'message' => "The user don't have permisstion to this route."], 403);
        // }
        $storeId = Auth::user()->store->id;
        // // $orders = Auth::user()->store->orders->whereDate('datetime', $selectedDate);
        // $orders = Order::where('store_id', $storeId)
        //     ->withCount('orderDetails')
        //     ->with('orderDetails.productCustomize')
        //     ->whereYear('datetime', '=', $year)
        //     ->whereMonth('datetime', '=', $month)->get();
        // return response($orders);
        return response(
            Product::with('productCustomize')
                ->with('productCustomize.orderDetails')
                ->with('productCustomize.orderDetails.order')
                ->whereHas('productCustomize.orderDetails.order', function ($query) use ($month, $year) {
                    $query->whereMonth('datetime', '=', $month)
                        ->whereYear('datetime', '=', $year);
                })
                ->get()

        );
    }
}
