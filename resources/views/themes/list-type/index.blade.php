@extends('welcome')
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
                <h2>Categories of "{{$shop->name}}" shop</h2>
            </div>
            <div class="shops-items">
                <div class="row">
                    @forelse($categories as $category)
                        <div class="col-lg-3 mb-5">
                            <div class="card" style="width: 18rem;">
                                <img src="{{$category->img}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$category->title}}</h5>
                                    <hr>
                                    <a href="{{route('shop.products.show',['shop' => $shop,'category'=>$category])}}" class="btn btn-primary">
                                        Go to products
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        No categories
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection