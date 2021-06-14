<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;

class BasketController extends Controller
{
    public function addOrderIntoBasket(BasketRequest $request)
    {
        $basket = Basket::create([
            'user_id' => Auth::id(),
            'order_id' => $request->order_id
        ]);

        return response()->json([
            'code' => 201,
            'message' => 'Товар добавлен в корзину',
            'body' => $basket
        ], 201);
    }

    public function deleteOrderOfBasket($id)
    {
        $basket = Basket::findOrFail($id);
        $basket->delete();

        return response()->json([], 204);
    }

    public function deleteAllOrdersOfBasket()
    {
        $basketAllOfCurrentUser = Basket::where('user_id', Auth::id())->get();
        $basketAllOfCurrentUser->each(function ($item) {
            $item->delete();
        });

        return response()->json([], 204);
    }

    public function getBasketInfo()
    {
        $basketAllOfCurrentUser = Basket::where('user_id', Auth::id())->get();
        $orders = [];

        if (count($basketAllOfCurrentUser) > 0) {
            $sum = 0;
            foreach ($basketAllOfCurrentUser as $basket) {
                $sum += $basket->order->price;
                $orders[] = $basket->order;
            }
        }

        return response()->json([
            'code' => 200,
            'message' => 'Получена информация о корзине',
            'body' => [
                'sum' => $sum,
                'count' => count($basketAllOfCurrentUser),
                'orders' => $orders
            ]
        ], 200);
    }
}
