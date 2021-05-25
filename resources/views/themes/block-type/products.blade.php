@extends('welcome')
@section('back-link',route('shop.show',['shop' => $category->shop]))
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
                <h2>Товари категорії "{{$category->title}}"</h2>
            </div>
            <div class="shops-items">
                <div class="row justify-content-center mb-4">
                    <div class="col-12 p-3">
                        {{$products->links()}}
                    </div>
                </div>
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-3 mb-5">
                            <div class="card" style="width: 18rem; height: 100%">
                                <img src="{{$product->img}}" class="card-img-top" alt="..." style="height: 200px">
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                    <h6 class="text-danger">{{$product->is_published == \App\Models\Shop\Product::STATUS_NOT_AVAILABLE ? 'Немає в наявності' : ''}}</h6>
                                    <div class="d-flex flex-row">
                                        <div class="product-rating m-0">
                                            @for($i=0;$i<$product->getRate();$i++)
                                                <i class="fas fa-star gold"></i>
                                            @endfor
                                            @for($i=$product->getRate();$i<5;$i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="card-text"
                                       style="height: 120px">{{\Illuminate\Support\Str::limit($product->description, 150, '...')}}</p>
                                    <hr>
                                    <div class="d-flex">
                                        <a href="{{route('shop.product.show',['shop' => $shop,'product'=>$product])}}"
                                           class="btn btn-primary mr-1">
                                            Переглянути <i class="fas fa-eye"></i>
                                        </a>
                                        @auth()
                                            @if($product->is_published == \App\Models\Shop\Product::STATUS_PUBLISHED)

                                                <form action="{{route('shopping-cart.store')}}" method="post"
                                                      class="d-inline float-right add-to-shopping-cart mr-1"
                                                      data-disabled="{{$product->isInShoppingCart()}}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <button type="button"
                                                            class="btn btn-success " {{$product->isInShoppingCart()?'disabled':''}} >
                                                        {{--                                                <i class="fas fa-shopping-cart"></i> {{$product->price}}$--}}
                                                        <i class="fas fa-shopping-cart"></i> {{number_format($product->price,2,',',' ')}}{{$shop->currency}}
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{route('wishlist.store')}}" method="post"
                                                  class="d-inline add-to-wishlist"
                                                  data-disabled="{{$product->isInWishlist()}}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <button type="button"
                                                        class="btn btn-danger h-100" {{$product->isInWishlist()?'disabled':''}}>
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            </form>
                                        @endauth

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        Немає категорій!
                    @endforelse
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-12 p-3">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
