<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
    // register by admin ----------
    Route::post('/register',[UserController::class,'register']);

    // register by restaurant ower ----------
    Route::post('/create_account',[UserController::class,'createAccount']);

    // get user already login ----------
    Route::get('/user',[UserController::class,'getUser']);

    // get staff by restaurant owner ----------
    Route::get('/staff',[UserController::class,'getSaff']);

    // logout ----------
    Route::post('/logout',[UserController::class,'logout']);

    // category ------------------//
    Route::resource('categories', CategoryController::class);
    
    // prouduct ------------------//
    Route::resource('products', ProductController::class);

    // order ------------------//
    Route::resource('orders', OrderController::class);

    Route::get('/orders/completed/{is_complete}', [OrderController::class, 'getByCompelted']);
    Route::get('/orders/paid/{is_paid}', [OrderController::class, 'getByPaid']);

    // table ------------------//
    Route::resource('tables', TableController::class);

    // role ------------------//
    Route::resource('roles', RoleController::class);
});

Route::post('/login',[UserController::class,'login']);  