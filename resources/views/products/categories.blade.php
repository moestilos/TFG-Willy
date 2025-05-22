<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Categorías - PunkMoes</title>
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
<body class="bg-gradient-to-b from-purple-900 via-purple-800 to-purple-900 text-white min-h-screen py-12" 
      style="background-attachment: fixed; background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('img/fondomorado.jpg') }}');">
    
    <div class="container mx-auto px-4">
        <h1 class="text-5xl text-yellow-400 font-bold mb-12 text-center">Nuestras Categorías</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Camisetas -->
            <a href="{{ route('products.camisetas') }}" 
               class="bg-black rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-all duration-300 overflow-hidden group">
                <div class="aspect-square relative overflow-hidden">
                    <img src="{{ asset('img/cf.png') }}" alt="Camisetas" 
                         class="object-cover w-full h-full transform transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6 border-t border-gray-700">
                    <h2 class="text-3xl text-yellow-400 font-bold mb-2">Camisetas</h2>
                    <p class="text-gray-400">Explora nuestra colección de camisetas</p>
                </div>
            </a>

            <!-- Sudaderas -->
            <a href="{{ route('products.sudaderas') }}" 
               class="bg-black rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-all duration-300 overflow-hidden group">
                <div class="aspect-square relative overflow-hidden">
                    <img src="{{ asset('img/sf.png') }}" alt="Sudaderas" 
                         class="object-cover w-full h-full transform transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6 border-t border-gray-700">
                    <h2 class="text-3xl text-yellow-400 font-bold mb-2">Sudaderas</h2>
                    <p class="text-gray-400">Descubre nuestras sudaderas</p>
                </div>
            </a>

            <!-- Gorras -->
            <a href="{{ route('products.gorras') }}" 
               class="bg-black rounded-xl border border-gray-700 hover:border-yellow-500/50 transition-all duration-300 overflow-hidden group">
                <div class="aspect-square relative overflow-hidden">
                    <img src="{{ asset('img/gf.png') }}" alt="Gorras" 
                         class="object-cover w-full h-full transform transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6 border-t border-gray-700">
                    <h2 class="text-3xl text-yellow-400 font-bold mb-2">Gorras</h2>
                    <p class="text-gray-400">Mira nuestra selección de gorras</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>
