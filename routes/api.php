<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpecificationController;

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

Route::get('/subcategories', [CategoryController::class, 'sub']);

Route::prefix('categories')->group(function ($item) {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/?limit={count}', [CategoryController::class, 'index']);

    Route::get('/{slug}', [CategoryController::class, 'getCategory']);
    Route::get('/{slug}/subsubcategories', [CategoryController::class, 'getFirstAbleCategories']);
});

Route::prefix('order')->group(function ($item) {
    Route::get('/{orderId}', [OrderController::class, 'getOrder']);
    Route::get('/{orderId}/reviews', [ReviewController::class, 'getReviews']);
    Route::get('/{orderId}/specifications', [SpecificationController::class, 'getSpecifications']);
});

Route::prefix('admin')->middleware('auth:api')->group(function ($item) {
    Route::post('/category/create', [CategoryController::class, 'createCategory']);
});
