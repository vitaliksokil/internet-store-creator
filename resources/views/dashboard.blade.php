
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Your Shop') }}
        </h2>
    </x-slot>

    <div class="container pb-5">
        <div class="alert alert-warning mt-5 text-center" role="alert">
            Тепер вам потрібно створити свій магазин! Будь ласка заповніть всі поля!
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group list-group-flush mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('shop.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ім'я магазину *</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Опис *</label>
                <textarea class="form-control" name="description" id="description" required>{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Картинка *</label>
                <input type="file" class="form-control" name="img" id="img">
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Рубрика магазину *</label>
                <select name="shop_type_id" id="" class="form-control">
                    @forelse($shopTypes as $shopType)
                        <option value="{{$shopType->id}}">{{$shopType->type}}</option>
                    @empty
                        Немає рубрик!
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label for="currency" class="form-label">Валюта магазину *</label>
                <select name="currency" id="currency" class="form-control">
                    @forelse(\App\Models\Shop\Shop::CURRENCIES as $key=>$shopType)
                        <option value="{{$key}}">{{$key}} - {{$shopType}}</option>
                    @empty
                        Немає валют!
                    @endforelse
                </select>
            </div>
            <hr>
            <div class="mb-3">
                <h4 class="form-label">Контактна інформація</h4>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Адрес</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Номер телефону</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Контактний e-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <button type="submit" class="btn btn-primary">Підтвердити</button>
        </form>
    </div>
</x-app-layout>
