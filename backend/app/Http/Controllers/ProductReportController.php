<?php

namespace App\Http\Controllers;

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
        // Check the user permission
        // if (!User::roleRequired('restaurant_owner')) {
        //     return response()->json(['success' => false, 'message' => "The user don't have permisstion to this route."], 403);
        // }
        $orders = Auth::user()->store->orders;
        return response($orders);
    }
}
