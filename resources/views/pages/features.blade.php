@extends('welcome')

@section('main-content')
    <div class="container">
        <div class="goal pt-10 pb-10">
            <div class="goal-title text-center">
                <h2>Можливості</h2>
            </div>
            <div class="container py-4 goal-items">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-5">
                        <img src="{{asset('img/goal/creating.png')}}" alt="">
                        <h1 class="display-5 fw-bold">Створення магазину</h1>
                        <p class="col-md-8 fs-4">Ви можете з легкістю створити свій магазин</p>
                    </div>
                </div>
                <div class="row align-items-md-stretch">
                    <div class="col-md-6">
                        <div class="h-100 p-5 text-white bg-dark rounded-3">
                            <img src="{{asset('img/goal/fill.png')}}" alt="">
                            <h2>Заповнення контентом</h2>
                            <p>Ви можете додавати категорії та товари для свого магазину</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="h-100 p-5 bg-light border rounded-3">
                            <img src="{{asset('img/goal/stripe.png')}}" alt="">
                            <h2>Отримання оплати за допомогою Stripe</h2>
                            <p>Приєднання Stripe аккаунта допоможе вам приймати оплати онлайн</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mb-6 mt-6">
            <div class="container py-4 goal-items">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-5">
                        <img src="{{asset('img/goal/cart.png')}}" alt="">
                        <h1 class="display-5 fw-bold">Кошик</h1>
                        <p class="col-md-8 fs-4">Добавлення товарів в кошик та подальше їх замовлення</p>
                    </div>
                </div>
                <div class="row align-items-md-stretch">
                    <div class="col-md-6">
                        <div class="h-100 p-5 text-white bg-dark rounded-3">
                            <img src="{{asset('img/goal/wishlist.png')}}" alt="">
                            <h2>Список бажаного</h2>
                            <p>Добавлення товарів в список бажаного допоможе вам не загубити свій бажаний товар</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="h-100 p-5 bg-light border rounded-3">
                            <img src="{{asset('img/goal/new-post.png')}}" alt="">
                            <h2>Отримання замовлення на відділення нової пошти</h2>
                            <p>Покупці можуть отримувати свої замовлення на відділення нової пошти</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
