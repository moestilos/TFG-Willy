<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito - PunkMoes</title>
    @vite(['resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Teko", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
    </style>
</head>
<body class="min-h-screen py-12" 
      style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('img/fondomorado.jpg') }}') no-repeat center center fixed; 
             background-size: cover;">
    
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-12">
            <h1 class="text-6xl text-yellow-400 font-semibold tracking-wider">Tu Carrito</h1>
            <a href="{{ url()->previous() }}" class="text-white text-xl hover:text-yellow-400 transition-colors">
                Volver
            </a>
        </div>
        
        @if($cartItems->isEmpty())
            <div class="text-center py-12">
                <p class="text-white text-2xl mb-4">Tu carrito está vacío</p>
                <a href="{{ route('products.categories') }}" class="text-yellow-400 text-xl hover:text-yellow-500 transition-colors">
                    Ver productos
                </a>
            </div>
        @else
            <div class="bg-black/80 rounded-xl p-6">
                @foreach($cartItems as $item)
                    <div class="flex items-center justify-between border-b border-gray-700 py-4 last:border-0">
                        <div>
                            <h3 class="text-2xl text-white">{{ ucfirst($item->product_type) }} - Modelo {{ $item->product_number }}</h3>
                            <p class="text-yellow-400">Cantidad: {{ $item->quantity }}</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <p class="text-3xl text-white">${{ $item->price }}</p>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                
                <div class="mt-6 text-right">
                    <p class="text-4xl text-white mb-4">Total: ${{ $cartItems->sum('price') }}</p>
                    <button class="bg-yellow-500 text-black text-xl px-8 py-3 rounded hover:bg-yellow-600 transition-colors">
                        Proceder al pago
                    </button>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
