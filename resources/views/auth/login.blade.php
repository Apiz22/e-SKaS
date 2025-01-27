<x-guest-layout>
    <div class="w-full max-w-md mx-auto">
        <div class="text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-800">Log Masuk</h2>
            <p class="mt-2 text-gray-600">Sila Masukkan Email dan Kata Laluan</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <x-text-input id="email" 
                        class="form-input pl-10" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" 
                        placeholder="Masukkan Email" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <x-input-label for="password" :value="__('Kata Laluan')" class="text-sm font-medium text-gray-700" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <x-text-input id="password" 
                        class="form-input pl-10" 
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="Masukkan Kata Laluan" />
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <i id="toggleIcon" class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" 
                        class="w-4 h-4 rounded border-gray-300 text-blue-500 focus:ring-blue-400">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                {{-- @if (Route::has('password.request'))
                    <a class="text-sm link-hover" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif --}}
            </div>

            <div>
                <button type="submit" 
                class="w-full border bg-[#3498db] text-white hover:bg-[#2980b9] focus:ring-2 focus:ring-[#85c1e9] focus:outline-none rounded-lg">
                {{ __('Log Masuk') }}
                </button>
            </div>

            <!-- Sign up link -->
            {{-- <div class="text-center">
                <span class="text-sm text-gray-600">Don't have an account?</span>
                <a href="{{ route('register') }}" class="text-sm link-hover ml-1">Sign up</a>
            </div> --}}
        </form>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
        });
    </script>
</x-guest-layout>