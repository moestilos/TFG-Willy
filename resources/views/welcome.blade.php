<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PunkMoes - Tienda Online</title>
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Teko", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            letter-spacing: 0.025em;
        }

        input::placeholder {
            font-family: "Teko", sans-serif;
        }

        .nav-link {
            font-weight: 400;
            font-size: 1.25rem;
        }

        .brand-text {
            font-weight: 500;
            letter-spacing: 0.05em;
        }
    </style>
</head>
<body class="min-h-screen" 
      style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('img/fondomorado.jpg') }}') no-repeat center center fixed; 
             background-size: cover;">
    
    <!-- Header -->
    <header class="fixed w-full text-gray-400 bg-gradient-to-r from-black to-gray-900 border-b border-gray-800">
        <div class="container mx-auto p-4">
            <div class="flex justify-between items-center">
                <!-- Logo Section -->
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16 w-16 rounded-full border-2 border-transparent group-hover:border-yellow-500 transition-all duration-300">
                        <div class="absolute inset-0 rounded-full bg-yellow-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <span class="text-3xl text-white hover:text-yellow-400 transition-colors duration-300 cursor-pointer brand-text">PunkMoes</span>
                </div>

                <!-- Navigation -->
                <nav class="flex items-center space-x-8">
                    <!-- Search Bar -->
                    <div class="relative">
                        <input type="search" 
                               placeholder="Buscar productos..." 
                               class="bg-gray-900/50 w-64 px-4 py-2 rounded-lg text-white placeholder-gray-400 border border-gray-700 focus:border-yellow-500 focus:outline-none transition-all duration-300">
                    </div>

                    <!-- Nav Links -->
                    <div class="flex items-center space-x-6 text-lg">
                        <a href="{{ route('products.categories') }}" class="text-white hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 nav-link">
                            Productos
                        </a>
                        @auth
                            <a href="{{ route('cart.index') }}" class="text-white hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 nav-link">
                                Carrito
                            </a>
                            <a href="{{ url('/dashboard') }}" class="text-white hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 nav-link">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 nav-link">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg transition-colors duration-300 nav-link">
                                    Registro
                                </a>
                            @endif
                        @endauth
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center min-h-screen px-4 pt-24">
        <h1 class="text-8xl font-bold text-yellow-400 mb-8 tracking-wider">PunkMoes</h1>
        <p class="text-3xl text-white mb-12 tracking-wide">Tu tienda de ropa urbana</p>
        
        <a href="{{ route('products.categories') }}" 
           class="bg-yellow-500 hover:bg-yellow-600 text-black text-2xl px-8 py-4 rounded-lg font-medium tracking-wide transition-colors inline-flex items-center gap-3">
            Entrar a la tienda
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
</body>
</html>
