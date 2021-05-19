@extends('welcome')
@section('back-link',route('shops.index',['type'=>$shop->type]))
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
                <h2>Категорії магазину "{{$shop->name}}"</h2>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    {{$categories->links()}}
                </div>
            </div>
            <div class="shops-items">
                <div class="row">
                    @forelse($categories as $category)
                        <div class="col-lg-3 mb-5">
                            <div class="card" style="width: 18rem;">
                                <img src="{{$category->img}}" class="card-img-top" alt="..." style="height: 200px">
                                <div class="card-body">
                                    <h5 class="card-title" style="height: 75px">{{\Illuminate\Support\Str::limit($category->title, 40, '...')}}</h5>
                                    <hr>
                                    <h6 class="mr-1">Кількість товарів: {{$category->products()->count()}}</h6>
                                    <hr>
                                    <a href="{{route('shop.products.show',['shop' => $shop,'category'=>$category])}}" class="btn btn-primary">
                                        Перейти до товарів
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        Немає категорій
                    @endforelse
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
