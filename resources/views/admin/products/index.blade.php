<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestionar Productos - FunkMoes</title>
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
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-light text-white">Productos</h2>
                    <a href="{{ route('admin.products.create') }}" 
                       class="bg-gradient-to-r from-red-700 to-red-500 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-400 transition-all duration-300">
                        Nuevo Producto
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Imagen</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Precio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Categoría</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($products as $product)
                            <tr>
                                <td class="px-6 py-4">
                                    <img src="{{ Storage::url($product->image) }}" class="w-20 h-20 object-cover rounded">
                                </td>
                                <td class="px-6 py-4 text-gray-300">{{ $product->name }}</td>
                                <td class="px-6 py-4 text-gray-300">${{ number_format($product->price, 2) }}</td>
                                <td class="px-6 py-4 text-gray-300">{{ $product->category }}</td>
                                <td class="px-6 py-4 space-x-3">
                                    <a href="{{ route('admin.products.edit', $product) }}" 
                                       class="text-blue-400 hover:text-blue-300">Editar</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300" 
                                                onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>
