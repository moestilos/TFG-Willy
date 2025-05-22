<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen flex items-center justify-center relative font-['Space_Grotesk'] bg-black">
    <x-falling-stars />
    
    <div class="relative w-full max-w-md p-8 rounded-xl bg-black/30 backdrop-blur-md border border-red-500/10 shadow-[0_0_15px_rgba(220,38,38,0.07)] animate-fade-in-up">
        <div class="relative z-10 space-y-8">
            <div class="text-center space-y-2">
                <h2 class="text-3xl font-light text-white">Reset Password</h2>
                <div class="h-1 w-32 bg-gradient-to-r from-red-700 to-red-500 mx-auto rounded-full"></div>
            </div>

            <p class="text-gray-400 text-sm text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
            </p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <div class="space-y-1">
                    <label for="email" class="block text-sm text-gray-300">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                           class="w-full bg-white/5 border-0 border-b border-red-500/30 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500/50 placeholder:text-gray-500 transition-all duration-300"
                           placeholder="Enter your email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="flex flex-col gap-4 pt-4">
                    <button type="submit" 
                            class="w-full py-3 px-6 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg transform hover:translate-y-[-2px] hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300 flex items-center justify-center gap-2">
                        <span>Send Reset Link</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </button>
                    
                    <div class="text-center">
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center text-sm text-gray-400 hover:text-red-400 transition-colors duration-300 gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>
                            <span>Back to login</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
