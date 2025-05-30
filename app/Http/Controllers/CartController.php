<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;

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

    public function processPayment(Request $request)
    {
        $request->validate([
            'card_name' => 'required',
            'card_number' => 'required|size:16',
            'expiry' => 'required|size:5',
            'cvv' => 'required|size:3',
        ]);

        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $total = $cartItems->sum('price');

        // Enviar email
        Mail::to(Auth::user()->email)->send(new PurchaseConfirmation($cartItems, $total));

        // Limpiar carrito
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')
            ->with('success', '¡Compra realizada con éxito! 🎉')
            ->with('details', [
                'message' => 'Hemos enviado un correo electrónico con los detalles de tu pedido.',
                'total' => $total,
                'email' => Auth::user()->email
            ]);
    }
}
