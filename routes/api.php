<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource('products',ProductController::class);

// Route::controller(ProductController::class)->group(function(){
//     Route::get('/searchproducts/{key}','searchProducts');
//     Route::apiResource('products',ProductController::class);
// });   

// Route::middleware(['auth:sanctum'])->group(function(){

//     //return user information
//     Route::get('/user', function (Request $request) {
//             return $request->user();});

//             //manage product table
//     Route::apiResource('products',ProductController::class);

//     Route::controller(ProductController::class)->group(function(){
//         Route::get('/searchproducts/{key}','searchProducts');
//     });   
// });



