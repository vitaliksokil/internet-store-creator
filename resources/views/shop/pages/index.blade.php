@extends('shop.main')

@section('main')
    <section id="shop-index">

    <div class=" bg-white border-b border-gray-200">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-primary ml-auto mr-5" type="submit" href="{{route('shop.edit')}}">
                    <i class="fas fa-edit"></i> Редагувати
                </a>
            </div>
        </nav>

        <div class="main-bar">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="avatar">
                            <img src="{{$shop->img}}" alt="">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="shop-name"><h1>{{$shop->name}}</h1></div>
                        <div class="shop-link">
                            <p>Рубрика магазину: {!! $shop->type->icon !!}{{$shop->type->type}}</p>
                        </div>
{{--                        <div class="shop-link">--}}
{{--                            <a href="{{$shop->getSiteUrl()}}">--}}
{{--                                {{$shop->getSiteUrl()}}--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <hr>
                        <div class="shop-description">Опис: <p class="bg-light">{{$shop->description}}</p></div>
                        <div class="shop-description">Адрес: <p class="bg-light">{{$shop->address}}</p></div>
                        <div class="shop-description">Номер телефону: <p class="bg-light">{{$shop->phone_number}}</p></div>
                        <div class="shop-description">Email: <p class="bg-light">{{$shop->email}}</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection
