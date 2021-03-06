@extends('shop.main')

@section('main')
    <section id="shop-index">

    <div class=" bg-white border-b border-gray-200">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-primary ml-5" type="submit" href="{{route('shop.index')}}">
                    <i class="fas fa-arrow-left"></i> Назад
                </a>
            </div>
        </nav>

        <div class="main-bar">
            <div class="container">
                <div class="row">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group list-group-flush mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{route('shop.update')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Ім'я *</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ $shop->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Опис *</label>
                            <textarea class="form-control" name="description" id="description" required>{{ $shop->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Рубрика магазину *</label>
                            <select name="shop_type_id" id="" class="form-control">
                                @forelse($shopTypes as $shopType)
                                    <option value="{{$shopType->id}}" {{$shop->type->id == $shopType->id ? "selected" : ''}}>{{$shopType->type}}</option>
                                @empty
                                    Немає рубрик!
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Картинка</label>
                            <img src="{{$shop->img}}" alt="" class="img-form">
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <h4 class="form-label">Контактна інформація</h4>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Адрес</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $shop->address }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Номер телефону</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $shop->phone_number }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Контактний Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $shop->email }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Підтвердити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection
