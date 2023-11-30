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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/product', function (Request $request) {
    return $request->product();
});
 
Route::get('product', [ProductController::class, 'index']);
Route::get('product/{id}', [ProductController::class, 'show']); 
Route::post('addnew', [ProductController::class, 'store']); 
Route::put('productupdate/{id}', [ProductController::class, 'update']);
Route::delete('productdelete/{id}', [ProductController::class, 'destroy']);