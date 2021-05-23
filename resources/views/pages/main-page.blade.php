@extends('welcome')

@section('main-content')
    <div class="slider">
        <div class="owl-carousel owl-theme">
            <div class="item"><img src="{{asset('img/slider/slide-1.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('img/slider/slide-2.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('img/slider/slide-3.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('img/slider/slide-4.jpg')}}" alt=""></div>
        </div>
    </div>
    <div class="container">
        <div class="goal pt-10 pb-10">
            <div class="goal-title text-center">
                <h2>Можливості</h2>
            </div>
            <div class="goal-items mt-10">
                <div class="row justify-around ">
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/creating.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Створення магазину</h4>
                            <p>Ви можете з легкістю створити свій магазин</p>
                        </div>
                    </div>
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/fill.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Заповнення контентом</h4>
                            <p>Ви можете додавати категорії та товари для свого магазину</p>
                        </div>
                    </div>
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/stripe.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Отримання оплати за допомогою Stripe</h4>
                            <p>Приєднання Stripe аккаунта допоможе вам приймати оплати онлайн</p>
                        </div>
                    </div>

                </div>
                <hr class="mb-6 mt-6">
                <div class="row justify-around ">
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/cart.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Кошик</h4>
                            <p>Добавлення товарів в кошик та подальше їх замовлення</p>
                        </div>
                    </div>
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/wishlist.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Список бажаного</h4>
                            <p>Добавлення товарів в список бажаного допоможе вам не загубити свій бажаний товар</p>
                        </div>
                    </div>
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/new-post.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Отримання замовлення на відділення нової пошти</h4>
                            <p>Покупці можуть отримувати свої замовлення на відділення нової пошти</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="shops pt-10 pb-10">
        <div class="container">
            <div class="shops-title text-center mb-10">
                <h2>Рубрики магазинів</h2>
            </div>
            <div class="shops-items">
                <div class="row">
                    @foreach($shopTypes as $shopType)
                        <div class="col-lg-3 mb-5">
                            <div class="card" style="width: 18rem;height: 100%">
                                <img src="{{asset($shopType->image)}}" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <h5 class="card-title">{{$shopType->type}}</h5>
                                    <hr>
                                    <div>Кількість магазинів : {{$shopType->shops()->count()}}</div>
                                    <hr>
                                    <a href="{{route('shops.index',['type'=>$shopType])}}" class="btn btn-primary">Перейти до магазинів</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
