@extends('welcome')

@section('main-content')
    <main class="p-5">

        <div class="container marketing">
            <div class="goal-title text-center">
                <h2>FAQs</h2>
            </div>
            <!-- START THE FEATURETTES -->
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Як мені створити свій магазин?</h2>
                    <p class="lead">Для створення магазину, потрібно зареєструватись. Кнопку реєстрації ви можете знайти в правому верхньому куті. Після проходження реєстрації будь ласка підтвердіть свій поштовий адрес та Ви будете перенаправленні на сторінку створення магазину!</p>
                </div>
                <div class="col-md-5">
                    <img  height="500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="{{asset('img/faqs/shop-create.png')}}" alt="">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Як приєднати Stripe Account?</h2>
                    <p class="lead">
                        Для того, щоб приєднати Stripe перейдіть у свій <span class="text-muted">Профіль Продаця</span>
                        і там Ви побачите сторінку "Stripe Connect", перейдіть на неї та натисніть кнопку для приєднання. Після
                        цих дій ви будете перенаправленні на Stripe для створення аккаунта!
                    </p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img   height="500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="{{asset('img/faqs/stripe-connect.png')}}" alt="">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Я хочу оплатити своє замовлення онлайн, як це зробити?</h2>
                    <p class="lead">При створенні замовлення у Вас буде вибір між оплатою накладеним платежем та оплатою онлайн, виберіть оплату онлайн!</p>
                </div>
                <div class="col-md-5">
                    <img  height="500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="{{asset('img/faqs/stripe-checkout.png')}}" alt="">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->

    </main>
@endsection
