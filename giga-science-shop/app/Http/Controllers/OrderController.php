<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders (optional for admin).
     */
    public function index()
    {
        // Only allow admin or authenticated users to view orders
        $orders = Order::all();
        return response()->json($orders);
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'total' => 'required|numeric',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user(); // Get the currently authenticated user

        // Create new order
        $order = Order::create([
            'user_id' => $user->id,
            'products' => json_encode($request->products),
            'total' => $request->total,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
        ]);

        return response()->json([
            'message' => 'Order placed successfully!',
            'order' => $order
        ]);
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    /**
     * Update the specified order.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }

    /**
     * Remove the specified order.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
