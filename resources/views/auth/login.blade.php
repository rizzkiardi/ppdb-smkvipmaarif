<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- <div class="w-full mx-auto max-w-sm p-4 bg-[#fff] border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"> --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-6" >
            @csrf
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Masuk</h5>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus placeholder=""/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            {{-- <div class="mt-4">
                <label for="email" class="text-sm">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="text-slate-800 rounded-md border-1 border-slate-300 block mt-1 w-full focus:ring-[#00AA5B]/50 focus:border-[#00AA5B]/50"  autocomplete="email" placeholder="">
                @error('email')
                    <span class="text-sm italic text-red-600">{{ $message }}</span>
                @enderror            
            </div>   --}}
          
            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Kata Sandi')" />
                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" placeholder="" />
                    <span class="toggle-password absolute right-[10px] top-[25%]" onclick="togglePassword()">
                        <img src="https://img.icons8.com/material-outlined/24/000000/visible.png" id="eyeIcon">
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
           
            <!-- Remember Me -->
            <div class="flex items-end">
                {{-- <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <label for="remember_me" class="inline-flex items-center">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div> --}}
                {{-- @if (Route::has('password.request'))
                    <a class="ms-auto text-sm text-[#00AA5B] hover:underline dark:text-[#00AA5B]" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                @endif --}}
            </div>
    
            {{-- <div class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <x-primary-button class="">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div> --}}
            <button type="submit" class="w-full text-white bg-[#00AA5B] hover:bg-[#00AA5B]  font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#03AC0E] dark:hover:bg-[#03AC0E] dark:focus:ring-blue-800">Masuk</button>

            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Belum punya akun? <a href="{{ route('register') }}" class="text-[#00AA5B] hover:underline dark:text-[#03AC0E]">Daftar</a>
            </div>
        </form>
    {{-- </div> --}}
</x-guest-layout>

<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.src = "https://img.icons8.com/material-outlined/24/000000/invisible.png"; // Eye slash icon
        } else {
            passwordField.type = "password";
            eyeIcon.src = "https://img.icons8.com/material-outlined/24/000000/visible.png"; // Eye icon
        }
    }
</script>
