<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubsubResource;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Subsubcategory;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->limit) {
            return CategoryResource::collection(
                DB::table('categories')
                    ->limit($request->limit)
                    ->get());
        }
        return CategoryResource::collection(Category::all());
    }

    public function getCategory(Request $request, $slug)
    {
        try {
            $subcategory = null;
            $category = Category::query()
                ->where('slug', $slug)
                ->first();
            $subcategory = Subcategory::query()
                ->where('slug', $slug)
                ->first();
            $subsubcategory = Subsubcategory::query()
                ->where('slug', $slug)
                ->first();
            if ($category) {
                return response()->json([
                    'id' => $category->id,
                    'title' => $category->title,
                    'slug' => $category->slug,
                    'subCategories' => SubResource::collection($category->subcategory)
                ]);
            }
            if ($subcategory) {
                return response()->json([
                    'id' => $subcategory->id,
                    'title' => $subcategory->title,
                    'slug' => $subcategory->slug,
                    'subsubcategory' => SubsubResource::collection($subcategory->subsubcategory)
                ]);
            }
            if ($subsubcategory) {
                return response()->json([
                    'id' => $subsubcategory->id,
                    'title' => $subsubcategory->title,
                    'slug' => $subsubcategory->slug
                ]);
            }
            if (!$category || !$subcategory) {
                throw new NotFoundHttpException();
            }

        } catch (NotFoundHttpException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Not Found Category'
            ]);
        }
    }

    public function sub()
    {
        return Category::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'slug' => $item->slug,
                'subcategories' => SubResource::collection($item->subcategory)
            ];
        });
    }

    public function getFirstAbleCategories(Request $request, string $slug)
    {
        $category = Category::query()
            ->where('slug', $slug)
            ->first();
        dd($category);
    }

}
