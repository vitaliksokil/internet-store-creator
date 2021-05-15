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
            <div class="shops-items">
                <div class="row">
                    <div class="col-md-4">
                        <div class="p-4 mb-3 bg-light rounded">
                            <h4 class="fst-italic">Про "{{$shop->name}}" магазин</h4>
                            <p class="mb-0">{{$shop->description}}</p>
                        </div>

                        <div class="p-4">
                            <h4 class="fst-italic">Категорії "{{$shop->name}}" магазину</h4>
                            <ol class="list-unstyled mb-0">
                                @forelse($categories as $category)
                                    <li><a href="{{route('shop.products.show',['shop'=>$shop,'category'=>$category])}}">{{$category->title}}</a></li>
                                @empty
                                    <li>Немає категорій</li>
                                @endforelse
                            </ol>
                        </div>

                        <div class="p-4">
                            <h4 class="fst-italic">Рекомендовані товари</h4>
                            <ol class="list-unstyled">
                                @forelse($recommendedProducts as $rProduct)
                                    <li class="mb-4">
                                        <a class="d-flex align-items-center" href="{{route('shop.product.show',['shop'=>$shop,'product'=>$rProduct])}}">
                                            <img src="{{$rProduct->img}}" alt="" class="mr-2" style="width: 60px">
                                            {{$rProduct->title}}
                                        </a>
                                    </li>
                                @empty
                                    <li>Немає рекомендованих товарів</li>
                                @endforelse
                            </ol>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="content-wrapper">
                            <div class="item-container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <img class="w-100" src="{{$product->img}}" alt="">
                                        </div>

                                        <div class="col-7">
                                            <div class="product-title">{{$product->title}}</div>
{{--                                            <div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>--}}
                                            <div class="product-rating">
                                                @for($i=0;$i<$rate;$i++)
                                                    <i class="fas fa-star gold"></i>
                                                @endfor
                                                @for($i=$rate;$i<5;$i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </div>
                                            <hr>
                                            <div class="product-price">{{number_format($product->price,2,',',' ')}}{{\App\Models\Shop\Product::CURRENCIES[$product->currency]}}</div>
{{--                                            <div class="product-stock">In Stock</div>--}}
                                            <hr>
                                            <div class="btn-group cart">
                                                <form action="{{route('shopping-cart.store')}}" method="post" class="add-to-shopping-cart" data-disabled="{{$product->isInShoppingCart()}}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <button type="button" class="btn btn-success " {{$product->isInShoppingCart()?'disabled':''}} >
                                                        {{--                                                <i class="fas fa-shopping-cart"></i> {{$product->price}}$--}}
                                                        <i class="fas fa-shopping-cart"></i> {{number_format($product->price,2,',',' ')}}{{\App\Models\Shop\Product::CURRENCIES[$product->currency]}}
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="btn-group wishlist">
                                                <form action="{{route('wishlist.store')}}" method="post" class="add-to-wishlist" data-disabled="{{$product->isInWishlist()}}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <button type="button" class="btn btn-danger" {{$product->isInWishlist()?'disabled':''}}>
                                                        <i class="fas fa-heart"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 card  mt-5">
                                        <div class="bd-example">
                                            <nav>
                                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Опис</button>
                                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Відгуки</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade active show p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <p>{{$product->description}}</p>
                                                </div>
                                                <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    @forelse($feedbacks as $feedback)
                                                        <div class="card mb-3">
                                                            <div class="row g-0">
                                                                <div class="col-12">
                                                                    <div class="card-body d-flex justify-content-between">
                                                                        <div class="card-body-header">
                                                                            <h6 class="card-title">{{$feedback->user->name}}</h6>
                                                                            <p class="card-text" style="font-size: 15px">
                                                                                @for($i=0;$i<$feedback->rate;$i++)
                                                                                    <i class="fas fa-star gold"></i>
                                                                                @endfor
                                                                                @for($i=0;$i<5-$feedback->rate;$i++)
                                                                                    <i class="fas fa-star"></i>
                                                                                @endfor
                                                                            </p>
                                                                        </div>
                                                                        <div class="card-body-body">

                                                                            <p class="card-text" style="font-size: 15px">{{$feedback->text}}</p>
                                                                            <p class="card-text"><small class="text-muted">{{date('F j, Y, g:i a',strtotime($feedback->created_at))}}</small></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        Немає відгуків
                                                        <br>
                                                    @endforelse
                                                    @auth
                                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Додати відгук</button>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Залиште ваш відгук</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-success" role="alert" style="display: none" id="successMessage"></div>

                    <form action="{{route('feedback.store')}}" method="post" id="leaveFeedback">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Text</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rate" class="form-label">Рейтинг</label>
                            <select class="form-select" id="rate" name="rate" aria-label="Default select example">
                                @for($i=1;$i<=5;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                            <button type="submit" class="btn btn-primary">Підтвердити</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
