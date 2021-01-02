<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return CategoryResource::collection(Category::all());
    }
    public function limitOrAll(Request $request){
        if($request->limit){
            return DB::table('categories')
                ->limit($request->limit)
                ->get();
        }
        return Category::all();
    }
}
