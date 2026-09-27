<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $request->total_amount,
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Orden creada',
            'order' => $order
        ]);
    }

    public function index()
    {
        return response()->json(
            Order::where('user_id', auth()->id())->get()
        );
    }
}
