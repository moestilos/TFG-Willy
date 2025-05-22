<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Categorías - PunkMoes</title>
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
            <h1 class="text-4xl md:text-5xl font-light text-white">Nuestras Categorías</h1>
            <div class="h-1 w-32 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Camisetas -->
            <div class="group relative animate-fade-in-up" style="animation-delay: 100ms">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-700 to-red-500 rounded-xl blur opacity-0 group-hover:opacity-75 transition duration-500"></div>
                <a href="{{ route('products.camisetas') }}" 
                   class="relative flex flex-col bg-black/30 backdrop-blur-md rounded-xl border border-red-500/10 overflow-hidden">
                    <div class="aspect-square relative overflow-hidden">
                        <img src="{{ asset('img/cf.png') }}" alt="Camisetas" 
                             class="object-cover w-full h-full transform transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6 border-t border-red-500/10">
                        <h2 class="text-2xl text-white font-light mb-2">Camisetas</h2>
                        <p class="text-gray-400 text-sm">Explora nuestra colección de camisetas</p>
                    </div>
                </a>
            </div>

            <!-- Sudaderas -->
            <div class="group relative animate-fade-in-up" style="animation-delay: 200ms">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-700 to-red-500 rounded-xl blur opacity-0 group-hover:opacity-75 transition duration-500"></div>
                <a href="{{ route('products.sudaderas') }}" 
                   class="relative flex flex-col bg-black/30 backdrop-blur-md rounded-xl border border-red-500/10 overflow-hidden">
                    <div class="aspect-square relative overflow-hidden">
                        <img src="{{ asset('img/sf.png') }}" alt="Sudaderas" 
                             class="object-cover w-full h-full transform transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6 border-t border-red-500/10">
                        <h2 class="text-2xl text-white font-light mb-2">Sudaderas</h2>
                        <p class="text-gray-400 text-sm">Descubre nuestras sudaderas</p>
                    </div>
                </a>
            </div>

            <!-- Gorras -->
            <div class="group relative animate-fade-in-up" style="animation-delay: 300ms">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-700 to-red-500 rounded-xl blur opacity-0 group-hover:opacity-75 transition duration-500"></div>
                <a href="{{ route('products.gorras') }}" 
                   class="relative flex flex-col bg-black/30 backdrop-blur-md rounded-xl border border-red-500/10 overflow-hidden">
                    <div class="aspect-square relative overflow-hidden">
                        <img src="{{ asset('img/gf.png') }}" alt="Gorras" 
                             class="object-cover w-full h-full transform transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6 border-t border-red-500/10">
                        <h2 class="text-2xl text-white font-light mb-2">Gorras</h2>
                        <p class="text-gray-400 text-sm">Mira nuestra selección de gorras</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>
