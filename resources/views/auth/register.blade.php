<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen flex items-center justify-center relative font-['Space_Grotesk'] bg-black">
    <x-falling-stars />
    
    <div class="relative w-full max-w-md p-8 rounded-xl bg-black/30 backdrop-blur-md border border-red-500/10 shadow-[0_0_15px_rgba(220,38,38,0.07)] animate-fade-in-up">
        <!-- Neon effect -->
        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-700 to-red-500 rounded-xl blur opacity-0 group-hover:opacity-75 transition duration-500"></div>
        
        <div class="relative z-10 space-y-8">
            <div class="text-center space-y-2">
                <h2 class="text-4xl font-light text-white mb-1">Create Account</h2>
                <div class="h-1 w-32 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full"></div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div class="space-y-1">
                    <label for="name" class="block text-sm text-gray-300">Name</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus
                           class="w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                           placeholder="Enter your name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400 text-xs" />
                </div>

                <!-- Email -->
                <div class="space-y-1">
                    <label for="email" class="block text-sm text-gray-300">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required
                           class="w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                           placeholder="Enter your email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
                </div>

                <!-- Password -->
                <div class="space-y-1">
                    <label for="password" class="block text-sm text-gray-300">Password</label>
                    <input id="password" type="password" name="password" required
                           class="w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                           placeholder="Choose a password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
                </div>

                <!-- Confirm Password -->
                <div class="space-y-1">
                    <label for="password_confirmation" class="block text-sm text-gray-300">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           class="w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                           placeholder="Confirm your password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="flex flex-col gap-4 pt-4">
                    <button type="submit" 
                            class="w-full py-3 px-6 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300 flex items-center justify-center gap-2">
                        <span>Create Account</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                    
                    <div class="text-center">
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center text-sm text-gray-400 hover:text-red-400 transition-colors duration-300 gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>
                            <span>Already have an account? Login</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
