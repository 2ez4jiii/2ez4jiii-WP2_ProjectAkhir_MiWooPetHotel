<x-guest-layout>
    <div class="bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('/img/pethotel3.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <div class="relative z-10">
                <x-authentication-card>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ms-4">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </x-authentication-card>
            </div>
        </div>
    </div>
</x-guest-layout>
