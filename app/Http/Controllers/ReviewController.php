<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReviews(Request $request, $orderId) {
        $order = Order::find($orderId);
        return response()->json(['reviews' => $order->reviews]);
    }
}
