<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('img/logo.png')}}" alt="">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Дякуєм за реєстрацію! Перед тим як почати Ви повинні підтвердити свою електронну адресу нажавши на посилання, яке ми відправили Вам. Якщо Ви не отримали поштового повідомлення, ми з радістю надішлемо Вам інше!') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                {{ __('Нове посилання для підтвердження електронного адресу надіслано на email, який Ви ввели під час реєстрації!') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Повторно відправити підтвердження електронного адресу') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Вийти
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
