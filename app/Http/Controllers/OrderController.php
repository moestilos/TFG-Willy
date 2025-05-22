<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa el Facade Auth
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Contracts\Auth\Authenticatable;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
        ]);

        $total = 0;
        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            if ($product->stock < $item['quantity']) {
                return response()->json(['error' => 'Stock insuficiente'], 400);
            }
            $total += $product->price * $item['quantity'];
        }

        /** @var Authenticatable|null $user */
        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user?->id,
            'total' => $total,
        ]);

        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'unit_price' => $product->price,
            ]);
            $product->decrement('stock', $item['quantity']);
        }

        return response()->json(['message' => 'Compra realizada correctamente']);
    }
}
