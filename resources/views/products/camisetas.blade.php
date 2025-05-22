<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Camisetas - PunkMoes</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <h1 class="text-4xl md:text-5xl font-light text-white">Camisetas</h1>
            <div class="h-1 w-32 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @for($i = 1; $i <= 10; $i++)
                <div class="group relative animate-fade-in-up" style="animation-delay: {{ $i * 100 }}ms">
                    <div class="absolute  rounded-xl blur opacity-0 group-hover:opacity-75 transition duration-500"></div>
                    <div class="relative bg-black/30 backdrop-blur-md rounded-xl border border-red-500/10 overflow-hidden">
                        <div class="aspect-square relative overflow-hidden">
                            <img src="{{ asset("img/c{$i}.png") }}" alt="Camiseta {{ $i }}" 
                                 class="object-cover w-full h-full transform transition-all duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6 border-t border-red-500/10 bg-black/20">
                            <p class="text-red-400 text-xs uppercase tracking-widest mb-1">Camiseta</p>
                            <h2 class="text-white text-xl font-light mb-2">
                                @php
                                    $names = [
                                        'Akatsuki Shadow', 'Shinigami Spirit', 'Sakura Dream', 
                                        'Ronin Soul', 'Kitsune Magic', 'Kaiju Power',
                                        'Samurai Code', 'Oni Mask', 'Dragon Fury', 'Zen Master'
                                    ];
                                @endphp
                                {{ $names[$i-1] }}
                            </h2>
                            <p class="text-2xl text-white font-light mb-6">${{ number_format(19.99 + $i, 2) }}</p>
                            
                            @auth
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_type" value="camiseta">
                                    <input type="hidden" name="product_number" value="{{ $i }}">
                                    <input type="hidden" name="price" value="{{ 19.99 + $i }}">
                                    <button type="submit" 
                                            class="w-full py-3 px-6 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                                        Añadir al carrito →
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="block text-center w-full py-3 px-6 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                                    Iniciar sesión para comprar →
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    @include('components.footer')
</body>
</html>
