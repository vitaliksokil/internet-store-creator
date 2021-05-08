@extends('profile.layouts.profile-layout')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <div class="main-bar">
                <div class="container">

                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

                    <section>
                        @forelse($orders as $item)
                            <div class="row p-3" style="background: {{$item['shop']->settings->branding_second_color}};border-radius: 10px">

                                <div class="col-lg-8">
                                    <div class="card wish-list mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-4"><a href="{{route('shop.show',['shop' => $item['shop']])}}"><img src="{{$item['shop']->img}}" alt="" style="width: 80px;display: inline"></a>
                                                <a href="{{route('shop.show',['shop' => $item['shop']])}}">"{{$item['shop']->name}} Shop"</a>
                                                Cart (<span>{{$item['products']->count()}}</span> items)
                                            </h5>
                                            @forelse($item['products'] as $product)
                                                <div class="row mb-4">
                                                    <div class="col-md-5 col-lg-3 col-xl-3">
                                                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                                            <a href="{{route('shop.product.show',['shop' => $product->product->category->shop,'product'=>$product->product])}}">
                                                                <img class="img-fluid w-100"
                                                                     src="{{$product->product->img}}" alt="Sample">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 col-lg-9 col-xl-9">
                                                        <div class="d-flex flex-column justify-content-between h-100">
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <a class="text-decoration-none text-black" href="{{route('shop.product.show',['shop' => $product->product->category->shop,'product'=>$product->product])}}">
                                                                        <h5 class="text-uppercase">{{$product->product->title}}</h5>
                                                                    </a>
                                                                    <p class="mb-3 text-muted  small">{{shortDescription($product->product->description)}}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="def-number-input number-input safari_only mb-0 w-100">
                                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                                                class="minus"></button>
                                                                        <form action="{{route('shopping-cart.add-count')}}" method="post" id="product_quantity_{{$product->id}}">
                                                                            @csrf
                                                                            <input type="hidden" name="shopping_cart_id" value="{{$product->id}}">
                                                                            <input class="quantity product_quantity" min="1" name="count" value="{{$product->count}}" type="number" data-shopping-cart-id="{{$product->id}}">
                                                                        </form>
                                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                                class="plus"></button>
                                                                    </div>
                                                                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                                        Count
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-between align-items-center ">
                                                                <div>
                                                                    <form action="{{route('shopping-cart.destroy',['shoppingCart'=>$product])}}" method="get" class="d-inline">
                                                                        @csrf
                                                                        <button type="submit" class=" btn btn-danger card-link-secondary small text-uppercase mr-3">
                                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                                            Remove item
                                                                        </button>
                                                                    </form>
                                                                    <form action="{{route('profile.shopping-cart.move-to-wishlist')}}" method="post" class="d-inline">
                                                                        @csrf
                                                                        <input type="hidden" name="shopping_cart_id" value="{{$product->id}}">
                                                                        <button type="submit" class="btn btn-danger  card-link-secondary small text-uppercase">
                                                                            <i class="fas fa-heart mr-1"></i>
                                                                            Move to wish list
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <p class="mb-0"><span><strong>${{formatPrice($product->product->price)}}</strong></span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mb-4">
                                            @empty
                                                No products
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form action="{{route('shopping-cart.destroy.all',['shop'=>$product->shop_id])}}" method="get" class="d-inline float-right">
                                                @csrf
                                                <button type="submit" class=" btn btn-danger card-link-secondary small text-uppercase  mr-3">
                                                    <i class="fas fa-trash-alt mr-1"></i>
                                                    Remove All
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-3">The total amount of</h5>
                                            <ul class="list-group list-group-flush">
                                                @forelse($item['products'] as $product)
                                                    @if($loop->last)
                                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                            {{$product->product}} x {{$product->count}}
                                                            <span>${{formatPrice($product->product->price * $product->count)}}</span>
                                                        </li>
                                                    @else
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                            {{$product->product}} x {{$product->count}}
                                                            <span>${{formatPrice($product->product->price * $product->count)}}</span>
                                                        </li>
                                                    @endif
                                                @empty
                                                    No products
                                                @endforelse
                                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                    <div>
                                                        <strong>The total amount of</strong>
                                                    </div>
                                                    <span><strong>${{formatPrice($item['total_amount']/100)}}</strong></span>
                                                </li>
                                            </ul>
                                            <button type="button" class="btn btn-primary btn-block waves-effect waves-light"><i class="fas fa-truck-loading"></i> Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @empty
                            Your Shopping Cart is empty
                        @endforelse
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
