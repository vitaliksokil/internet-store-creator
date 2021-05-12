@extends('shop.main')

@section('main')
    <section id="shop-index">
       @include('components.back-btn',['url' => route('shop.orders.index')])
        <div class=" bg-white border-b border-gray-200">
            <div class="main-bar">
                <div class="container">
                    <h1>Замовлення № {{$item['order']->id}}</h1>

                    @include('session_messages.error_403')
                    @include('session_messages.message')

                    <section>
                            <div class="row p-3" style="background: {{$item['shop']->settings->branding_second_color}};border-radius: 10px">

                                <div class="col-lg-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            @if($item['order']->status)
                                                <button type="submit" disabled class=" btn btn-success card-link-secondary small text-uppercase  mr-3">
                                                    <i class="fas fa-check"></i>
                                                    Підтверджено!
                                                </button>
                                            @else
                                                <button type="submit" disabled class=" btn btn-danger card-link-secondary small text-uppercase  mr-3">
                                                    <i class="fas fa-times"></i>
                                                    Не підтверджено!
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="card wish-list mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-4"><a href="{{route('shop.show',['shop' => $item['shop']])}}"><img src="{{$item['shop']->img}}" alt="" style="width: 80px;display: inline"></a>
                                                <a href="{{route('shop.show',['shop' => $item['shop']])}}">"{{$item['shop']->name}} Shop"</a>
                                                (<span>{{$item['products']->count()}}</span> товари)
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
                                                                            <input type="hidden" name="shopping_cart_id" value="{{$product->id}}">
                                                                            <input class="quantity product_quantity" disabled min="1" name="count" value="{{$product->count}}" type="number" data-shopping-cart-id="{{$product->id}}">
                                                                    </div>
                                                                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                                        Кількість
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-between align-items-center ">
                                                                <div>
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
                                            <h5 class="mb-3">Дії</h5>
                                            <div class="row">
                                                <div class="col-6">
                                                    <form action="{{route('shop.orders.confirm',['order'=>$item['order']])}}" class="mb-2" method="post" onsubmit="return confirm('Ви впевнені, що хочете підтвердити дане замовлення?')">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-success w-100" {{$item['order']->status ? 'disabled' : ''}}><i class="fas fa-check"></i>Підтвердити</button>
                                                    </form>
                                                </div>
                                                <div class="col-6">

                                                    <form method="post" action="{{route('shop.orders.delete',['order'=>$item['order']])}}" class="mb-2" onsubmit="return confirm('Ви впевнені, що хочете видалити дане замовлення?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger w-100"><i class="fas fa-trash-alt"></i>Видалити</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-3">Загальна сума</h5>
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
                                                        <strong>Загальна сума</strong>
                                                    </div>
                                                    <span><strong>${{formatPrice($item['total_amount']/100)}}</strong></span>
                                                </li>
                                            </ul>
                                            <div class="d-flex flex-column align-content-center text-center">
                                                @if($item['order']->payment_type == 1)
                                                    <button type="submit" class="btn btn-outline-success btn-block waves-effect waves-light" disabled>
                                                        <img src="{{asset('img/stripe-logo.png')}}" class="image-icon" alt=""> Метод оплати - Online
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-outline-danger btn-block waves-effect waves-light" disabled>
                                                        <img src="{{asset('img/new-post.png')}}" class="image-icon" alt=""> Метод оплати - Offline
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-3">Дані покупця:</h5>
                                            @php
                                                $deliveryAddress = isset($item) ? $item['order']->user->delivery_address : '';
                                            @endphp
                                            <ul class="list-group list-group-flush">
{{--                                                "area" => "Вінницька"--}}
{{--                                                "city" => "Бар"--}}
{{--                                                "post_office" => "Відділення №1: вул. Леонтовича, 14"--}}
{{--                                                "client_name" => "Vitalii Sokil"--}}
{{--                                                "client_surname" => "Сокіл"--}}
{{--                                                "client_middlename" => "Святославович"--}}
{{--                                                "client_email" => "vitaliksokil200@gmail.com"--}}
{{--                                                "client_phone_number" => "+380986225367"--}}
                                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                    Область:
                                                    <span>{{$deliveryAddress->area}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                    Місто:
                                                    <span>{{$deliveryAddress->city}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                    Відділення:
                                                    <span>{{$deliveryAddress->post_office}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                    Ім'я:
                                                    <span>{{$deliveryAddress->client_name}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                    Фамілія:
                                                    <span>{{$deliveryAddress->client_surname}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                    Ім'я по батькові:
                                                    <span>{{$deliveryAddress->client_middlename}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                    Email:
                                                    <span>{{$deliveryAddress->client_email}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                    Номер телефону:
                                                    <span>{{$deliveryAddress->client_phone_number}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
