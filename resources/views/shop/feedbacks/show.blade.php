@extends('shop.main')

@section('main')
    <section id="shop-index">
       @include('components.back-btn',['url' => route('shop.orders.index')])
        <div class=" bg-white border-b border-gray-200">
            <div class="main-bar">
                <div class="container">
                    <h1>Відгук № {{$feedback->id}}</h1>

                    @include('session_messages.error_403')
                    @include('session_messages.message')

                    <section>
                            <div class="row p-3" style="background: {{$feedback->shop()->settings->branding_second_color}};border-radius: 10px">

                                <div class="col-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            @if($feedback->status)
                                                <button type="submit" disabled class=" btn btn-success card-link-secondary small text-uppercase  mr-3">
                                                    <i class="fas fa-check"></i>
                                                    Опубліковано!
                                                </button>
                                            @else
                                                <button type="submit" disabled class=" btn btn-danger card-link-secondary small text-uppercase  mr-3">
                                                    <i class="fas fa-times"></i>
                                                    Не опубліковано!
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="card wish-list mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-4"><a href="{{route('shop.show',['shop' => $feedback->shop()])}}"><img src="{{$feedback->shop()->img}}" alt="" style="width: 80px;display: inline"></a>
                                                <a href="{{route('shop.show',['shop' => $feedback->shop()])}}">"{{$feedback->shop()->name}} Shop"</a>
                                            </h5>
                                            <div class="row mb-4">
                                                <div class="col-md-5 col-lg-3 col-xl-3">
                                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                                        <a href="{{route('shop.product.show',['shop' => $feedback->shop(),'product'=>$feedback->product])}}">
                                                            <img class="img-fluid w-100"
                                                                 src="{{$feedback->product->img}}" alt="Sample">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-lg-9 col-xl-9">
                                                    <div class="d-flex flex-column justify-content-between h-100">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <a class="text-decoration-none text-black" href="{{route('shop.product.show',['shop' => $feedback->shop(),'product'=>$feedback->product])}}">
                                                                    <h5 class="text-uppercase">{{$feedback->product->title}}</h5>
                                                                </a>
                                                                <div class="row mt-5">
                                                                    <div class="col-12">
                                                                        <h3>Відгук:</h3>
                                                                        <p>{{$feedback->text}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mb-4">
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-3">Дії</h5>
                                            <div class="row">
                                                <div class="col-6">
                                                    <form action="{{route('shop.feedbacks.confirm',['feedback'=>$feedback])}}" class="mb-2" method="post" onsubmit="return confirm('Ви впевнені, що хочете опублікувати даний відгук?')">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-success w-100" {{$feedback->status ? 'disabled' : ''}}><i class="fas fa-check"></i>Опублікувати</button>
                                                    </form>
                                                </div>
                                                <div class="col-6">

                                                    <form method="post" action="{{route('shop.feedbacks.delete',['feedback'=>$feedback])}}" class="mb-2" onsubmit="return confirm('Ви впевнені, що хочете видалити даний відгук?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger w-100"><i class="fas fa-trash-alt"></i>Видалити</button>
                                                    </form>
                                                </div>
                                            </div>

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
