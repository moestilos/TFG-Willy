<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_type' => 'required|in:camiseta,sudadera,gorra',
            'product_number' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        CartItem::create([
            'user_id' => Auth::id(),
            'product_type' => $validated['product_type'],
            'product_number' => $validated['product_number'],
            'price' => $validated['price'],
            'quantity' => $request->quantity ?? 1
        ]);

        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    public function remove($id)
    {
        CartItem::where('user_id', Auth::id())
                ->where('id', $id)
                ->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }
}
