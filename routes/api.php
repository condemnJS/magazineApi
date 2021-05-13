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

Route::get('/user/{token}', [UserController::class, 'getUser']);
Route::get('/user/{token}/role', [UserController::class, 'getUserRole']);

Route::get('/subcategories', [CategoryController::class, 'subcategories']);
Route::get('/subsubcategories', [CategoryController::class, 'subsubcategories']);

Route::prefix('categories')->group(function ($item) {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/?limit={count}', [CategoryController::class, 'index']);
    Route::get('/childrens', [CategoryController::class, 'sub']);

    Route::get('/{slug}', [CategoryController::class, 'getCategory']);
    Route::get('/{slug}/subsubcategories', [CategoryController::class, 'getFirstAbleCategories']);
    Route::get('/{slug}/subcategories', [CategoryController::class, 'getSubCategoriesBySlug']);
});

Route::prefix('order')->group(function ($item) {
    Route::get('/{slug}', [OrderController::class, 'getOrderWithSlug']);


    Route::get('/all', [OrderController::class, 'getAllOrders']);
    Route::get('/{orderId}', [OrderController::class, 'getOrder']);
    Route::get('/{orderId}/reviews', [ReviewController::class, 'getReviews']);
    Route::get('/{orderId}/specifications', [SpecificationController::class, 'getSpecifications']);

    Route::post('/create', [OrderController::class, 'createOrder']);
});

Route::prefix('admin')->middleware('auth:api')->group(function ($item) {
    Route::post('/category/create', [CategoryController::class, 'createCategory']);
    Route::delete('/category/{category}/delete', [CategoryController::class, 'deleteCategory']);

    Route::post('/subcategory/create', [CategoryController::class, 'createSubCategory']);
    Route::delete('/subcategory/{subcategory}/delete', [CategoryController::class, 'deleteSubCategory']);

    Route::post('/subsubcategory/create', [CategoryController::class, 'createSubSubCategory']);
    Route::delete('/subsubcategory/{category}/delete', [CategoryController::class, 'deleteSubSubCategory']);
});
