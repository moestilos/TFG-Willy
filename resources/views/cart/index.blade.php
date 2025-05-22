<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito - PunkMoes</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        * {
            font-family: "Space Grotesk", sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-black">
    <x-falling-stars />
    @include('components.nav')
    
    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="text-center space-y-2 mb-12 animate-fade-in-up">
            <h1 class="text-4xl md:text-5xl font-light text-white">Tu Carrito</h1>
            <div class="h-1 w-32 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full"></div>
        </div>

        @if($cartItems->isEmpty())
            <div class="text-center py-12 animate-fade-in-up">
                <p class="text-gray-400 text-lg mb-6">Tu carrito está vacío</p>
                <a href="{{ route('products.categories') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                    Explorar productos
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        @else
            <div class="max-w-4xl mx-auto space-y-4">
                @foreach($cartItems as $item)
                    <div class="group relative animate-fade-in-up" style="animation-delay: {{ $loop->index * 100 }}ms">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-700 to-red-500 rounded-xl blur opacity-0 group-hover:opacity-75 transition duration-500"></div>
                        <div class="relative bg-black/30 backdrop-blur-md rounded-xl border border-red-500/10 p-6">
                            <div class="flex items-center justify-between">
                                <div class="space-y-1">
                                    <h3 class="text-xl text-white font-light">{{ ucfirst($item->product_type) }} - Modelo {{ $item->product_number }}</h3>
                                    <p class="text-gray-400">Cantidad: {{ $item->quantity }}</p>
                                </div>
                                <div class="flex items-center gap-6">
                                    <p class="text-2xl text-white font-light">${{ $item->price }}</p>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="relative mt-8 animate-fade-in-up bg-black/30 backdrop-blur-md rounded-xl border border-red-500/10 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-400">Total:</span>
                        <span class="text-3xl text-white font-light">${{ $cartItems->sum('price') }}</span>
                    </div>
                    <button class="w-full py-3 px-6 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                        Proceder al pago →
                    </button>
                </div>
            </div>
        @endif
    </div>

    @include('components.footer')
</body>
</html>
