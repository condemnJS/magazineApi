<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use App\Models\Basket;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addOrderIntoFavorite(BasketRequest $request)
    {
        $favorite = Favorite::where('order_id', $request->order_id)->first();
        if ($favorite) {
            return response()->json([
                'code' => 403,
                'message' => 'Товар уже добавлен в избранное'
            ], 403);
        }
        $favorite = Favorite::create([
            'user_id' => Auth::id(),
            'order_id' => $request->order_id
        ]);

        return response()->json([
            'code' => 201,
            'message' => 'Товар добавлен в избранное',
            'body' => $favorite
        ], 201);
    }

    public function deleteOrderOfFavorite($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();

        return response()->json([], 204);
    }

    public function getFavoriteInfo()
    {
        $favorite = Favorite::where('user_id', Auth::id())->get();

        return response()->json([
            'code' => 200,
            'message' => 'Получена информация о избранном',
            'favorites' => $favorite
        ], 200);
    }

}
