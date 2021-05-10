<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderController extends Controller
{
    public function getOrder(Request $request, int $orderId)
    {
        $order = Order::find($orderId);
        return response()->json(['order' => $order]);
    }

    public function createOrder(OrderRequest $request)
    {
        // dd($request->files('images')->getClientOriginalName());
        $jsonImages = [];
        foreach ($request->file('images') as $image) {
            $jsonImages[] = URL::to('/storage') . '/' . Storage::disk('public')->put('orders', $image);
        }
        Order::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'images' => json_encode($jsonImages),
            'subsubcategory_id' => $request->subsubcategory_id
        ]);
        return response()->json([
            'code' => 201,
            'message' => 'Товар успешно создан'
        ], 201);
    }

    public function getAllOrders()
    {
        $orders = Order::all();
        dd(json_decode($orders[3]->images));
    }

    public function getOrderWithSlug(Request $request, $slug)
    {
        if($category = Category::where('slug', $slug)->first()) {
            $body = collect($category->subcategory)->map(function ($item) {
                return $item->subsubcategory;
            })->flatten();
            $body->each(function ($item) {
                return $item->orders;
            });
//            $body = $body->map(function ($item) {
//               return $item->orders;
//            });
            return response()->json(['body' => $body]);
            dd($category->subcategory);

        }
        if($subcategory = Subcategory::where('slug', $slug)->first()) {

        }
        if($subsubcategory = Subsubcategory::where('slug', $slug)->first()) {
        }

        throw new HttpResponseException(response()->json(['message' => 'Не найдено'], 404));
    }
}
