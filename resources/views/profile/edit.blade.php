<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil - PunkMoes</title>
    @vite(['resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen font-['Space_Grotesk'] bg-black">
    <!-- Header -->
    @include('components.nav')
    
    <x-falling-stars />

    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="max-w-2xl mx-auto space-y-6">
            <h1 class="text-3xl font-light text-white text-center">Mi Perfil</h1>
            <div class="h-1 w-20 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full mb-8"></div>

            @if(session('status') === 'profile-updated')
                <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-lg backdrop-blur-sm">
                    Perfil actualizado correctamente
                </div>
            @endif

            <!-- Información del Perfil -->
            <div class="relative w-full p-8 rounded-xl bg-black/30 backdrop-blur-md border border-red-500/10 shadow-[0_0_15px_rgba(220,38,38,0.07)]">
                <h2 class="text-2xl font-light text-white mb-6">Información Personal</h2>
                
                <form action="{{ route('profile.update') }}" method="post" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div class="relative">
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                               class="peer w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                               placeholder="Tu nombre">
                        <label for="name" class="absolute left-4 -top-5 text-sm text-gray-300 transition-all duration-300">
                            Nombre
                        </label>
                    </div>

                    <div class="relative">
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                               class="peer w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                               placeholder="Tu email">
                        <label for="email" class="absolute left-4 -top-5 text-sm text-gray-300 transition-all duration-300">
                            Email
                        </label>
                    </div>

                    <button type="submit" 
                            class="w-full py-3 px-6 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                        Guardar Cambios →
                    </button>
                </form>
            </div>

            <!-- Cambiar Contraseña -->
            <div class="relative w-full p-8 rounded-xl bg-black/30 backdrop-blur-md border border-red-500/10 shadow-[0_0_15px_rgba(220,38,38,0.07)]">
                <h2 class="text-2xl font-light text-white mb-6">Cambiar Contraseña</h2>
                
                <form action="{{ route('password.update') }}" method="post" class="space-y-6">
                    @csrf
                    @method('put')

                    <div class="relative">
                        <input type="password" name="current_password" id="current_password"
                               class="peer w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                               placeholder="Tu contraseña actual">
                        <label for="current_password" class="absolute left-4 -top-5 text-sm text-gray-300 transition-all duration-300">
                            Contraseña Actual
                        </label>
                    </div>

                    <div class="relative">
                        <input type="password" name="password" id="password"
                               class="peer w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                               placeholder="Tu nueva contraseña">
                        <label for="password" class="absolute left-4 -top-5 text-sm text-gray-300 transition-all duration-300">
                            Nueva Contraseña
                        </label>
                    </div>

                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="peer w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                               placeholder="Confirma tu nueva contraseña">
                        <label for="password_confirmation" class="absolute left-4 -top-5 text-sm text-gray-300 transition-all duration-300">
                            Confirmar Nueva Contraseña
                        </label>
                    </div>

                    <button type="submit" 
                            class="w-full py-3 px-6 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                        Actualizar Contraseña →
                    </button>
                </form>
            </div>

            <!-- Eliminar Cuenta -->
            <div class="relative w-full p-8 rounded-xl bg-black/30 backdrop-blur-md border border-red-500/10 shadow-[0_0_15px_rgba(220,38,38,0.07)]">
                <h2 class="text-2xl font-light text-red-400 mb-6">Eliminar Cuenta</h2>
                
                <form action="{{ route('profile.destroy') }}" method="post">
                    @csrf
                    @method('delete')

                    <p class="text-gray-400 mb-6">Una vez que tu cuenta sea eliminada, todos tus datos serán permanentemente borrados.</p>

                    <button type="submit" 
                            class="w-full py-3 px-6 bg-red-500/10 text-red-400 border border-red-500/30 rounded-lg hover:bg-red-500/20 transition-all duration-300"
                            onclick="return confirm('¿Estás seguro de que quieres eliminar tu cuenta?')">
                        Eliminar Cuenta
                    </button>
                </form>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>
