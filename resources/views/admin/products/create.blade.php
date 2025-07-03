<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Producto - FunkMoes</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>* { font-family: "Space Grotesk", sans-serif; }</style>
</head>
<body class="min-h-screen bg-black">
    <x-falling-stars />
    @include('components.nav')

    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black/50 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-3xl font-light text-white mb-8">Crear Nuevo Producto</h2>

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-white">Nombre</label>
                        <input type="text" name="name" class="w-full mt-1 rounded-md bg-gray-800 border-gray-700 text-white" required>
                    </div>

                    <div>
                        <label class="block text-white">Descripción</label>
                        <textarea name="description" rows="4" class="w-full mt-1 rounded-md bg-gray-800 border-gray-700 text-white" required></textarea>
                    </div>

                    <div>
                        <label class="block text-white">Precio</label>
                        <input type="number" name="price" step="0.01" class="w-full mt-1 rounded-md bg-gray-800 border-gray-700 text-white" required>
                    </div>

                    <div>
                        <label class="block text-white">Stock</label>
                        <input type="number" name="stock" min="0" class="w-full mt-1 rounded-md bg-gray-800 border-gray-700 text-white" required>
                    </div>

                    <div>
                        <label class="block text-white">Categoría</label>
                        <select name="category" class="w-full mt-1 rounded-md bg-gray-800 border-gray-700 text-white" required>
                            <option value="camisetas">Camisetas</option>
                            <option value="sudaderas">Sudaderas</option>
                            <option value="gorras">Gorras</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-white">Imagen</label>
                        <input type="file" name="image" class="w-full mt-1 text-white" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-gradient-to-r from-red-700 to-red-500 text-white px-6 py-2 rounded-lg hover:from-red-600 hover:to-red-400 transition-all duration-300">
                            Crear Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>
