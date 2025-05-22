<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        Log::info('Iniciando checkout');
        
        try {
            $cartItems = CartItem::where('user_id', Auth::id())->get();
            
            if($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Tu carrito está vacío');
            }

            Stripe::setApiKey(config('services.stripe.secret'));

            $lineItems = [];
            foreach ($cartItems as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => ucfirst($item->product_type),
                            'description' => "Talla: {$item->size}",
                        ],
                        'unit_amount' => intval($item->price * 100),
                    ],
                    'quantity' => $item->quantity,
                ];
            }

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => url('/checkout/success'),
                'cancel_url' => url('/cart'),
            ]);

            Log::info('Sesión de Stripe creada: ' . $session->id);
            
            return redirect($session->url);
            
        } catch (\Exception $e) {
            Log::error('Error en checkout: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }
    }

    public function success()
    {
        CartItem::where('user_id', Auth::id())->delete();
        return view('payment.success');
    }
}
