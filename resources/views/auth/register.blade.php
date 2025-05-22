<!-- Google Fonts for Teko -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Futuristic Register Background -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#0f2027] via-[#2c5364] to-[#232526] bg-cover bg-center relative" style="font-family: 'Teko', sans-serif;">
    <div class="relative w-full max-w-md p-10 rounded-2xl shadow-2xl bg-white/10 backdrop-blur-md border border-cyan-400/30">
        <!-- Neon border effect -->
        <div class="absolute -inset-1 rounded-2xl bg-gradient-to-tr from-cyan-400 via-transparent to-indigo-600 blur-lg opacity-60 animate-pulse z-0"></div>
        <div class="relative z-10">
            <h2 class="text-center text-4xl font-semibold text-cyan-300 tracking-widest mb-8 drop-shadow-lg">Register</h2>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="relative mb-8">
                    <x-text-input id="name" class="peer w-full bg-transparent border-0 border-b-2 border-cyan-400 text-white placeholder-transparent focus:outline-none focus:border-indigo-400 text-lg transition-all duration-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                    <label for="name" class="absolute left-0 top-2.5 text-cyan-200 text-lg pointer-events-none transition-all duration-300 peer-focus:-top-5 peer-focus:text-indigo-400 peer-focus:text-xs peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-lg peer-placeholder-shown:text-cyan-200">{{ __('Name') }}</label>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-pink-400" />
                </div>

                <!-- Email -->
                <div class="relative mb-8">
                    <x-text-input id="email" class="peer w-full bg-transparent border-0 border-b-2 border-cyan-400 text-white placeholder-transparent focus:outline-none focus:border-indigo-400 text-lg transition-all duration-300" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                    <label for="email" class="absolute left-0 top-2.5 text-cyan-200 text-lg pointer-events-none transition-all duration-300 peer-focus:-top-5 peer-focus:text-indigo-400 peer-focus:text-xs peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-lg peer-placeholder-shown:text-cyan-200">{{ __('Email') }}</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-400" />
                </div>

                <!-- Password -->
                <div class="relative mb-8">
                    <x-text-input id="password" class="peer w-full bg-transparent border-0 border-b-2 border-cyan-400 text-white placeholder-transparent focus:outline-none focus:border-indigo-400 text-lg transition-all duration-300" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                    <label for="password" class="absolute left-0 top-2.5 text-cyan-200 text-lg pointer-events-none transition-all duration-300 peer-focus:-top-5 peer-focus:text-indigo-400 peer-focus:text-xs peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-lg peer-placeholder-shown:text-cyan-200">{{ __('Password') }}</label>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-400" />
                </div>

                <!-- Confirm Password -->
                <div class="relative mb-8">
                    <x-text-input id="password_confirmation" class="peer w-full bg-transparent border-0 border-b-2 border-cyan-400 text-white placeholder-transparent focus:outline-none focus:border-indigo-400 text-lg transition-all duration-300" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                    <label for="password_confirmation" class="absolute left-0 top-2.5 text-cyan-200 text-lg pointer-events-none transition-all duration-300 peer-focus:-top-5 peer-focus:text-indigo-400 peer-focus:text-xs peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-lg peer-placeholder-shown:text-cyan-200">{{ __('Confirm Password') }}</label>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-pink-400" />
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a class="text-cyan-300 hover:text-indigo-400 text-sm underline transition-colors duration-200" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="relative inline-block px-8 py-2 text-cyan-300 font-semibold text-lg uppercase tracking-widest overflow-hidden border-none bg-gradient-to-r from-cyan-500/30 to-indigo-600/30 rounded shadow transition-all duration-300 hover:from-cyan-400 hover:to-indigo-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-cyan-400">
                        <span class="absolute inset-0 bg-gradient-to-r from-cyan-400/20 to-indigo-600/20 animate-pulse"></span>
                        <span class="relative">{{ __('Register') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
