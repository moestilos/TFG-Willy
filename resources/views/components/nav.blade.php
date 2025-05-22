<header class="sticky top-0 w-full backdrop-blur-md bg-black/80 border-b border-red-500/10 z-50">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo Section -->
            <div class="flex items-center space-x-4">
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-700 to-red-500 rounded-full blur opacity-0 group-hover:opacity-75 transition duration-500"></div>
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="relative h-14 w-14 rounded-full border-2 border-transparent group-hover:border-red-500 transition-all duration-500">
                </div>
                <a href="{{ url('/') }}" class="group">
                    <span class="text-2xl md:text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-gray-200 group-hover:from-red-400 group-hover:to-red-600 transition-all duration-500">
                        FunkMoes
                    </span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-white hover:text-red-400 transition-colors duration-300" @click="mobileMenu = !mobileMenu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Navigation -->
            <nav class="hidden lg:flex items-center space-x-6" x-show="!mobileMenu">
                <a href="{{ route('products.categories') }}" class="nav-link group">
                    <span class="relative text-gray-300 group-hover:text-red-400 transition-colors duration-300">
                        <span class="relative z-10">Productos</span>
                        <a href="{{ route('cart.index') }}" class="text-white hover:text-red-400 transition-colors duration-300 flex items-center gap-2 nav-link">
                                Carrito
                            </a>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-red-700 to-red-500 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </a>
                @auth
                    <div class="relative group">
                        <button class="flex items-center space-x-2 text-gray-300 hover:text-red-400 transition-colors duration-300">
                            <span class="w-9 h-9 rounded-full bg-gradient-to-r from-red-700 to-red-500 flex items-center justify-center text-white font-medium">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        
                        <div class="absolute right-0 mt-2 w-48 rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top scale-95 group-hover:scale-100">
                            <div class="rounded-lg bg-black/30 backdrop-blur-md border border-red-500/10 shadow-lg">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-300 hover:text-red-400 hover:bg-gray-800/50 rounded-t-lg transition-all duration-300 flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Mi Perfil</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:text-red-400 hover:bg-gray-800/50 rounded-b-lg transition-all duration-300 flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>Cerrar Sesión</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-red-400 transition-all duration-300">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-6 py-2 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                                Registro
                            </a>
                        @endif
                    </div>
                @endauth
            </nav>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenu" class="lg:hidden">
        <div class="px-4 py-3 space-y-3 bg-black/30 backdrop-blur-md border-t border-red-500/10">
            <a href="{{ route('products.categories') }}" class="block text-gray-300 hover:text-red-400 transition-colors duration-300">
                Productos
            </a>
            @auth
                <a href="{{ route('profile.edit') }}" class="block text-gray-300 hover:text-red-400 transition-colors duration-300">
                    Mi Perfil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-gray-300 hover:text-red-400 transition-colors duration-300">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-gray-300 hover:text-red-400 transition-colors duration-300">
                    Login
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block text-gray-300 hover:text-red-400 transition-colors duration-300">
                        Registro
                    </a>
                @endif
            @endauth
        </div>
    </div>
</header>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navigation', () => ({
            mobileMenu: false
        }))
    })
</script>
