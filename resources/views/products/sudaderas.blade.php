<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sudaderas - PunkMoes</title>
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
            <h1 class="text-4xl md:text-5xl font-light text-white">Sudaderas</h1>
            <div class="h-1 w-32 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @for($i = 1; $i <= 10; $i++)
                <div class="group relative animate-fade-in-up" style="animation-delay: {{ $i * 100 }}ms">
                    <div class="absolute -inset-0.5  rounded-xl blur opacity-0 group-hover:opacity-75 transition duration-500"></div>
                    <div class="relative bg-black/30 backdrop-blur-md rounded-xl border border-red-500/10 overflow-hidden">
                        <div class="aspect-square relative overflow-hidden">
                            <img src="{{ asset("img/s{$i}.png") }}" alt="Sudadera {{ $i }}" 
                                 class="object-cover w-full h-full transform transition-all duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-6 border-t border-red-500/10 bg-black/20">
                            <p class="text-red-400 text-xs uppercase tracking-widest mb-1">Sudadera</p>
                            <h2 class="text-white text-xl font-light mb-2">
                                @php
                                    $names = [
                                        'Yokai Night', 'Harajuku Style', 'Tokyo Lights', 
                                        'Shinobi Shadow', 'Neo Tokyo', 'Shogun Pride',
                                        'Hannya Spirit', 'Cyber Samurai', 'Geisha Art', 'Kabuki Soul'
                                    ];
                                @endphp
                                {{ $names[$i-1] }}
                            </h2>
                            <p class="text-2xl text-white font-light mb-6">${{ number_format(29.99 + $i, 2) }}</p>
                            
                            @auth
                                <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                                    @csrf
                                    <input type="hidden" name="product_type" value="sudadera">
                                    <input type="hidden" name="product_number" value="{{ $i }}">
                                    <input type="hidden" name="price" value="{{ 29.99 + $i }}">
                                    
                                    <!-- Selector de talla -->
                                    <div class="grid grid-cols-5 gap-2">
                                        @foreach(['XS', 'S', 'M', 'L', 'XL'] as $size)
                                            <label class="relative cursor-pointer">
                                                <input type="radio" name="size" value="{{ $size }}" required
                                                       class="peer absolute opacity-0">
                                                <div class="text-center py-2 border border-red-500/30 rounded-lg text-gray-400 
                                                            peer-checked:bg-gradient-to-r from-red-700 to-red-500 
                                                            peer-checked:text-white peer-checked:border-transparent
                                                            hover:border-red-500 transition-all duration-300">
                                                    {{ $size }}
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>

                                    <!-- Selector de cantidad -->
                                    <div class="flex items-center justify-between bg-black/30 rounded-lg border border-red-500/30 p-2">
                                        <span class="text-gray-400 px-2">Cantidad</span>
                                        <div class="flex items-center gap-2">
                                            <button type="button" onclick="decrementQuantity(this)"
                                                    class="w-8 h-8 rounded-lg border border-red-500/30 text-gray-400 hover:text-white hover:border-red-500 transition-all duration-300">
                                                -
                                            </button>
                                            <input type="number" name="quantity" value="1" min="1" max="10" required
                                                   class="w-12 bg-transparent text-center text-white border-0 focus:outline-none focus:ring-0"
                                                   readonly>
                                            <button type="button" onclick="incrementQuantity(this)"
                                                    class="w-8 h-8 rounded-lg border border-red-500/30 text-gray-400 hover:text-white hover:border-red-500 transition-all duration-300">
                                                +
                                            </button>
                                        </div>
                                    </div>

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

    <script>
        function incrementQuantity(button) {
            const input = button.previousElementSibling;
            const currentValue = parseInt(input.value);
            if (currentValue < 10) {
                input.value = currentValue + 1;
            }
        }

        function decrementQuantity(button) {
            const input = button.nextElementSibling;
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        }
    </script>
</body>
</html>
