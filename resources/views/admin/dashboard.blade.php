<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin - FunkMoes</title>
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

    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black/50 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-3xl font-light text-white mb-8">Panel de Administración</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('admin.products.index') }}" 
                       class="block p-6 bg-red-900/20 hover:bg-red-900/30 rounded-lg border border-red-800/50 transition-all duration-300">
                        <h3 class="text-xl font-semibold text-white mb-2">Gestionar Productos</h3>
                        <p class="text-gray-400">Añadir, editar o eliminar productos de la tienda</p>
                    </a>
                    
                    <!-- Puedes añadir más cards aquí para otras funcionalidades -->
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>
