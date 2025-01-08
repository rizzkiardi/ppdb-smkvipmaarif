<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" >
        @csrf
        <h5 class="my-5 text-xl font-medium text-gray-900 dark:text-white">Daftar akun</h5>

        <div class="space-y-4">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus placeholder=""/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder=""/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Kata Sandi')" />
                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" placeholder="" />
                    <span class="toggle-password absolute right-[10px] top-[25%]" onclick="togglePassword('password', 'eyeIcon1')">
                        <img src="https://img.icons8.com/material-outlined/24/000000/visible.png" id="eyeIcon1">
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                <div class="relative">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" :value="old('password_confirmation')" placeholder="" />
                    <span class="toggle-password absolute right-[10px] top-[25%] " onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                        <img src="https://img.icons8.com/material-outlined/24/000000/visible.png" id="eyeIcon2" >
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <button type="submit" class="mt-7 w-full text-white bg-[#00AA5B] hover:bg-[#00AA5B]  font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#00AA5B] dark:hover:bg-[#00AA5B] dark:focus:bg-[#00AA5B]">Daftar</button>

        <div class="flex items-center justify-start mt-4">
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                {{ __('Sudah punya akun?') }} <a href="{{ route('login') }}" class="text-[#00AA5B] hover:underline dark:text-[#00AA5B]">Masuk</a>
            </div>
        </div>
    </form>
</x-guest-layout>

<script>
    function togglePassword(fieldId, iconId) {
        const passwordField = document.getElementById(fieldId);
        const eyeIcon = document.getElementById(iconId);

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.src = "https://img.icons8.com/material-outlined/24/000000/invisible.png"; // Eye slash icon
        } else {
            passwordField.type = "password";
            eyeIcon.src = "https://img.icons8.com/material-outlined/24/000000/visible.png"; // Eye icon
        }
    }
</script>
