<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

// Authentication Endpoints
// Route::post('/login', [AuthManager::class, 'login']);
// Route::post('/logout', [AuthManager::class, 'logout']);

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add-product',[ProductsController::class,'add']);
Route::put('edit-product',[ProductsController::class,'edit']);
Route::delete('delete-product',[ProductsController::class,'delete']);
Route::get('getdata',[ProductsController::class,'getData']);