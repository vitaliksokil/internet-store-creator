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
                <div class="col-8 p-3">
                    {{$categories->links()}}
                </div>
            </div>
            <div class="shops-items">
                <div class="row justify-content-center">
                    <div class="col-8 ">

                        @forelse($categories as $category)
                            <div class="row p-2 bg-white border rounded">
                                <div class="col-md-3 mt-1">
                                    <a href="{{route('shop.products.show',['shop' => $shop,'category'=>$category])}}">
                                        <img class="img-fluid img-responsive rounded product-image"
                                             src="{{$category->img}}">
                                    </a>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <h5><a href="{{route('shop.products.show',['shop' => $shop,'category'=>$category])}}">{{\Illuminate\Support\Str::limit($category->title, 40, '...')}}</a></h5>
                                    <hr>
                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <h6 class="mr-1">Кількість товарів: {{$category->products()->where('is_published','>',\App\Models\Shop\Product::STATUS_UNPUBLISHED)->count()}}</h6>
                                    </div>
                                    <div class="d-flex flex-column mt-4">
                                        <a href="{{route('shop.products.show',['shop' => $shop,'category'=>$category])}}" class="btn btn-primary btn-sm">
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
                    <div class="col-8 p-3">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
