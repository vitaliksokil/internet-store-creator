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
                <h2>Товари "{{$category->title}}" категорії</h2>
            </div>
            <div class="shops-items">
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-3 mb-5">
                            <div class="card" style="width: 18rem;">
                                <img src="{{$product->img}}" class="card-img-top" alt="..." style="height: 200px">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                    <p class="card-text" style="height: 120px">{{\Illuminate\Support\Str::limit($product->description, 150, '...')}}</p>
                                    <hr>
                                    <div class="d-flex">
                                        <a href="{{route('shop.product.show',['shop' => $shop,'product'=>$product])}}" class="btn btn-primary mr-1">
                                            Переглянути <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{route('shopping-cart.store')}}" method="post" class="d-inline float-right add-to-shopping-cart mr-1" data-disabled="{{$product->isInShoppingCart()}}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button type="button" class="btn btn-success " {{$product->isInShoppingCart()?'disabled':''}} >
                                                {{--                                                <i class="fas fa-shopping-cart"></i> {{$product->price}}$--}}
                                                <i class="fas fa-shopping-cart"></i> {{number_format($product->price,2,',',' ')}}{{\App\Models\Shop\Product::CURRENCIES[$product->currency]}}
                                            </button>
                                        </form>
                                        <form action="{{route('wishlist.store')}}" method="post" class="d-inline add-to-wishlist" data-disabled="{{$product->isInWishlist()}}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button type="button" class="btn btn-danger h-100" {{$product->isInWishlist()?'disabled':''}}>
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        Немає категорій!
                    @endforelse
                </div>
            </div>
        </div>
    </div>


@endsection
