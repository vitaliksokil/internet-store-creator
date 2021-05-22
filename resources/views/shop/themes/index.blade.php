@extends('shop.main')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-auto mr-5" type="submit" href="{{route('shop.theme.edit')}}">
                        <i class="fas fa-edit"></i> Редагувати
                    </a>
                </div>
            </nav>

            <div class="main-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-name"><h2>Поточна тема: <span class="text-red-300">{{$shopTheme->name}}</span></h2></div>
                            <hr>
                            <h4>Приклад відображення</h4>
                            <div class="mb-3">
                                <img src="{{$shopTheme->image_preview}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
