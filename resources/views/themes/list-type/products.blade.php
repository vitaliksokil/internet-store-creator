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
                    @forelse($products as $product)
                        <div class="col-lg-3 mb-5">
                            <div class="card" style="width: 18rem;">
                                <img src="{{$product->img}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                    <p class="card-text">{{\Illuminate\Support\Str::limit($product->description, 150, '...')}}</p>
                                    <hr>
                                    <a href="{{route('shop.product.show',['shop' => $shop,'product'=>$product])}}" class="btn btn-primary">
                                        View <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="float-right btn btn-success"> <i class="fas fa-shopping-cart"></i> {{$product->price}}$</button>
                                    <button class="float-right btn btn-danger mr-3"> <i class="fas fa-heart"></i></button>
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
