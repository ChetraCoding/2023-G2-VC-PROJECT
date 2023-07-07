<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    // logout ----------
    Route::post('/logout',[UserController::class,'logout']);

    // category ------------------//
    // list category
    Route::get('/listCategory',[CategoryController::class,'index']);
    // create category
    Route::post('/createCategory',[CategoryController::class,'store']);
    // list product
    Route::get('/listProduct',[ProductController::class,'index']);
    
});
Route::post('/login',[UserController::class,'login']);
