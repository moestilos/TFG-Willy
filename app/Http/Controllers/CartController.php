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
        $request->validate([
            'product_type' => 'required|string',
            'product_number' => 'required|integer',
            'price' => 'required|numeric',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1|max:10'
        ]);

        CartItem::create([
            'user_id' => Auth::id(),
            'product_type' => $request->product_type,
            'product_number' => $request->product_number,
            'price' => $request->price,
            'size' => $request->size,
            'quantity' => $request->quantity
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
