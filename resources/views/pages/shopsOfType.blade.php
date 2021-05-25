@extends('welcome')
@section('back-link',route('home'))

@section('main-content')
{{--    <div class="slider">--}}
{{--        <div class="owl-carousel owl-theme">--}}
{{--            <div class="item"><img src="{{asset('img/slider/slide-1.jpg')}}" alt=""></div>--}}
{{--            <div class="item"><img src="{{asset('img/slider/slide-2.jpg')}}" alt=""></div>--}}
{{--            <div class="item"><img src="{{asset('img/slider/slide-3.jpg')}}" alt=""></div>--}}
{{--            <div class="item"><img src="{{asset('img/slider/slide-4.jpg')}}" alt=""></div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="shops pt-10 pb-10">
        <div class="container">
            <div class="shops-title text-center mb-10">
                <h2>Магазини рубрики "{{$type->type}}"</h2>
            </div>
            <div class="shops-items">
                <div class="row p-3">
                    {{$shops->links()}}
                </div>
                <div class="row">
                    @forelse($shops as $s)
                        <div class="col-lg-3 mb-5">
                            <div class="card" style="width: 18rem;height: 500px">
                                <img src="{{$s->img}}" class="card-img-top" alt="..." style="height: 300px">
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <h5 class="card-title">{{$s->name}}</h5>
                                    <hr>
                                    <div>Кількість категорій : {{$s->categories()->count()}}</div>
                                    <hr>
                                    <a href="{{route('shop.show',['shop' => $s])}}" class="btn btn-primary">Перейти до магазину</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        Немає магазинів
                    @endforelse
                </div>
                <div class="row p-3">
                    {{$shops->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
