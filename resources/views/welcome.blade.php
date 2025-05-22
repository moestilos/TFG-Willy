<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FunkMoes - Tienda Online</title>
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

    <!-- Main Content -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4">
        <div class="text-center space-y-8 animate-fade-in-up">
            <h1 class="text-6xl md:text-8xl font-light text-white">
                FunkMoes
                <div class="h-1 w-32 md:w-48 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full mt-4"></div>
            </h1>
            
            <p class="text-2xl md:text-3xl text-gray-400">Tu tienda de ropa urbana</p>
            
            <a href="{{ route('products.categories') }}" 
               class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-red-700 to-red-500 text-white text-xl rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                Entrar a la tienda
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </div>

    @include('components.footer')
</body>
</html>
