<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(Request $request, int $orderId) {
        $order = Order::find($orderId);
        return response()->json(['order' => $order]);
    }
}
