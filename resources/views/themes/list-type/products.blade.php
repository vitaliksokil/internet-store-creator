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
                        <div class="row p-2 bg-white border rounded">
                            <div class="col-md-3 mt-1">
                                <a href="{{route('shop.product.show',['shop' => $shop,'product'=>$product])}}" class="btn btn-primary w-100 mb-2 mr-1">
                                    <img class="img-fluid img-responsive rounded product-image" src="{{$product->img}}">
                                </a>
                            </div>
                            <div class="col-md-6 mt-1">
                                <h5>{{$product->title}}</h5>
                                <div class="d-flex flex-row">
                                    <div class="product-rating">
                                        @for($i=0;$i<$product->getRate();$i++)
                                            <i class="fas fa-star gold"></i>
                                        @endfor
                                        @for($i=$product->getRate();$i<5;$i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-justify text-truncate para mb-0">{{\Illuminate\Support\Str::limit($product->description, 150, '...')}}</p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">{{$shop->currency}}{{formatPrice($product->price)}}</h4>
                                </div>
                                <h6 class="text-danger">Немає в наявності</h6>
                                <div class="d-flex flex-column mt-4">
                                    <a href="{{route('shop.product.show',['shop' => $shop,'product'=>$product])}}" class="btn btn-primary w-100 mb-2 mr-1">
                                        Переглянути <i class="fas fa-eye"></i>
                                    </a>
                                    @auth()
                                        <form action="{{route('shopping-cart.store')}}" method="post" class="d-inline float-right w-100  mb-2 add-to-shopping-cart mr-1" data-disabled="{{$product->isInShoppingCart()}}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button type="button" class="btn btn-success w-100 " {{$product->isInShoppingCart()?'disabled':''}} >
                                                {{--                                                <i class="fas fa-shopping-cart"></i> {{$product->price}}$--}}
                                                <i class="fas fa-shopping-cart"></i> {{number_format($product->price,2,',',' ')}}{{$shop->currency}}
                                            </button>
                                        </form>
                                        <form action="{{route('wishlist.store')}}" method="post" class="d-inline add-to-wishlist w-100 mb-2" data-disabled="{{$product->isInWishlist()}}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button type="button" class="btn btn-danger h-100 w-100" {{$product->isInWishlist()?'disabled':''}}>
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        </form>
                                    @endauth

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
