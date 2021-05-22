<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('img/logo.png')}}" alt="">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Це захищена територія додатку. Будь ласка підтвердіть свій пароль перед тим як продовжити ') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Пароль')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Підтвердити') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
