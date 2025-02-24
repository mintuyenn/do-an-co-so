@vite(['resources/css/login.css'])
<x-auth-session-status class="mb-4" :status="session('status')" />
<h1 style="color: red; font-size: 40px; font-weight:bold; text-align:center">ĐĂNG NHẬP</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" class="text-sm" />
        <x-text-input id="email" class="x-text-input block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="x-input-error mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" class="text-sm" />
        <x-text-input id="password" class="x-text-input block mt-1 w-full"
                      type="password"
                      name="password"
                      required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="x-input-error mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-between mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class="ms-3" style="padding: 20px;">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form>
