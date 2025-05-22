<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sudaderas - PunkMoes</title>
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Teko", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
    </style>
</head>
<body class="min-h-screen py-12" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('img/fondomorado.jpg') }}') no-repeat center center fixed; background-size: cover;">
    <div class="container mx-auto px-4">
        <!-- Botón del carrito -->
        <div class="fixed top-4 right-4 z-50">
            <a href="{{ route('cart.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="text-xl font-medium tracking-wide">Carrito</span>
            </a>
        </div>
        <h1 class="text-6xl text-yellow-400 font-semibold mb-12 text-center tracking-wider">Sudaderas</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @for($i = 1; $i <= 10; $i++)
                <div class="bg-black rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-all duration-700 overflow-hidden cursor-pointer group">
                    <div class="relative aspect-square overflow-hidden">
                        <img src="{{ asset('img/sf.png') }}" alt="Sudadera front" 
                             class="object-cover w-full h-full absolute inset-0 opacity-0 transition-all duration-1000 transform scale-110 group-hover:scale-100 group-hover:opacity-100" />
                        <img src="{{ asset("img/s{$i}.png") }}" alt="Sudadera {{ $i }}" 
                             class="object-cover w-full h-full absolute inset-0 transition-transform duration-1000 transform scale-100 opacity-100 group-hover:scale-110 group-hover:opacity-0" />
                    </div>
                    <div class="p-6 border-t border-gray-700 bg-black">
                        <p class="text-yellow-400 text-sm tracking-widest uppercase mb-2 font-light">Sudadera</p>
                        <h2 class="text-white text-3xl font-medium tracking-wide mb-4">Modelo {{ $i }}</h2>
                        <p class="text-4xl text-white font-light tracking-wider mb-4">${{ 29.99 + $i }}</p>
                        @auth
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_type" value="sudadera">
                                <input type="hidden" name="product_number" value="{{ $i }}">
                                <input type="hidden" name="price" value="{{ 29.99 + $i }}">
                                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-black text-xl font-medium py-2 px-4 rounded transition-colors tracking-wide">
                                    Añadir al carrito
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block text-center w-full bg-yellow-500 hover:bg-yellow-600 text-black text-xl font-medium py-2 px-4 rounded transition-colors tracking-wide">
                                Iniciar sesión para comprar
                           