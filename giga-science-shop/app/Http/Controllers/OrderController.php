<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'total_price' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'payment_method' => $request->payment_method,
            'products' => $request->products,
            'total_price' => $request->total_price,
            'status' => 'pending',
            'paid' => false,
        ]);

        return response()->json([
            'message' => 'Order placed successfully!',
            'order' => $order
        ]);
    }

    public function pay($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $order->paid = true;
        $order->save();

        return response()->json(['message' => 'Order marked as paid.']);
    }
}
