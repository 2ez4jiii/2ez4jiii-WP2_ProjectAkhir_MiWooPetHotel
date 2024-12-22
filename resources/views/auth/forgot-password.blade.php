<x-guest-layout>
    <div class="bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('/img/pethotel3.jpg');">

        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>
            <div class="relative z-10">
                <div class="max-w-md w-full bg-white shadow-md rounded-lg overflow-hidden p-6">
                    <div class="flex justify-center mb-6">
                        <a href="{{ url('/') }}">
                            <img src="/img/miwoologo3.png" alt="Logo" class="w-24 h-auto hover:opacity-80 transition-opacity">
                        </a>
                    </div>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ $value }}
                        </div>
                    @endsession

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="block">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Email Password Reset Link') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</x-guest-layout>