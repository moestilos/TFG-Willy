<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500&display=swap" rel="stylesheet">

@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen flex items-center justify-center relative font-['Space_Grotesk']">
    <x-falling-stars />
    
    <div class="relative w-full max-w-md p-8 rounded-xl bg-black/30 backdrop-blur-md border border-red-500/10 shadow-[0_0_15px_rgba(220,38,38,0.07)] animate-fade-in-up">
        <div class="relative z-10 space-y-8">
            <div class="text-center space-y-2">
                <h2 class="text-3xl font-light text-white">Welcome Back</h2>
                <div class="h-1 w-20 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full"></div>
            </div>
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="space-y-6">
                    <!-- Email input -->
                    <div class="space-y-1">
                        <label for="email" class="block text-sm text-gray-300">Email</label>
                        <input id="email" type="email" name="email" required 
                               class="w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                               placeholder="Enter your email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
                    </div>

                    <!-- Password input -->
                    <div class="space-y-1">
                        <label for="password" class="block text-sm text-gray-300">Password</label>
                        <input id="password" type="password" name="password" required
                               class="w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                               placeholder="Enter your password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="remember_me" name="remember" 
                               class="rounded border-red-500/30 bg-white/5 text-red-500 focus:ring-red-500 focus:ring-offset-0">
                        <label for="remember_me" class="text-sm text-gray-300">Remember me</label>
                    </div>

                    <div class="flex items-center justify-between pt-4">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-sm text-neutral-600 hover:text-rose-500 transition-colors duration-300">
                                Forgot password?
                            </a>
                        @endif

                        <button type="submit" 
                                class="w-full py-3 px-6 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                            Sign In →
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
