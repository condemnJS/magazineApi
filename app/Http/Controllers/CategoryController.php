<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubResource;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request){
        if($request->limit){
            return CategoryResource::collection(
                DB::table('categories')
                ->limit($request->limit)
                ->get());
        }
        return CategoryResource::collection(Category::all());
    }
    public function getCategory(Request $request, $slug){
        $category = Category::query()
                    ->where('slug', $slug)
                    ->first();
        return response()->json([
            'title' => $category->title,
            'data' => SubResource::collection($category->subcategory)
        ]);
    }
}
