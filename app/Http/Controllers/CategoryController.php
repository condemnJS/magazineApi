<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\SubSubCategoryRequest;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

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
            ], 404);
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

    public function subcategories() 
    {
        return response()->json(['data' => Subcategory::all()]);
    }

    public function getFirstAbleCategories(Request $request, string $slug)
    {
        $category = Category::query()
            ->where('slug', $slug)
            ->first();
        dd($category);
    }

    public function createCategory(CategoryRequest $request) {
        $slug = Str::slug($request->title, '-');
        $image = Storage::disk('public')->put('categories', $request->image);
        Category::create([
            'title' => $request->title,
            'slug' => $slug,
            'image' => URL::to('/storage').'/'.$image
        ]);
        return response()->json([
            'code' => 201,
            'message' => 'Категория успешно создана'
        ], 201);
    }

    public function createSubCategory(SubCategoryRequest $request) {
        $slug = Str::slug($request->title, '-');
        $image = Storage::disk('public')->put('subcategories', $request->image);
        Subcategory::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'image' => URL::to('/storage').'/'.$image
        ]);
        return response()->json([
            'code' => 201,
            'message' => 'Подкатегория успешно создана'
        ], 201);
    }

    public function createSubSubCategory(SubSubCategoryRequest $request) {
        $slug = Str::slug($request->title, '-');
        $image = Storage::disk('public')->put('subsubcategories', $request->image);
        Subsubcategory::create([
            'title' => $request->title,
            'slug' => $slug,
            'subcategory_id' => $request->subcategory_id,
            'image' => URL::to('/storage').'/'.$image
        ]);

        return response()->json([
            'code' => 201,
            'message' => 'Подподкатегория успешно создана'
        ], 201);
    }


}
