<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories?limit={count}', [CategoryController::class, 'index']);

Route::get('/subcategories', [CategoryController::class, 'sub']);

Route::get('/categories/{slug}', [CategoryController::class, 'getCategory']);
