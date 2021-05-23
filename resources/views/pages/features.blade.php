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
                        <p class="col-md-8">
                            Ви можете з легкістю створити свій магазин. Достатньо лише зареєструватись та пройти прості кроки для створення свого бізнесу.
                        </p>
                        <hr>
                        <p class="col-md-8">
                            При створенні у Вас є можливість вказати свої контакті дані, які будуть відображатись на сторінках товарів!
                        </p>
                        <hr>
                        <p class="col-md-8">
                            Завантажте логотип Вашого бізнесу чи унікальну картинку, яка виділить вас серед інших!
                        </p>

                    </div>
                </div>
                <div class="row align-items-md-stretch">
                    <div class="col-md-6">
                        <div class="h-100 p-5 text-white bg-dark rounded-3">
                            <img src="{{asset('img/goal/fill.png')}}" alt="">
                            <h2>Заповнення контентом</h2>
                            <p>Добавляйте категорії для свого товару</p>
                            <hr>
                            <p>До своїх категорій у Вас є можливість добавляти товари, заповнивши їх назву,опис, картинку та інші необхідні поля.</p>
                            <hr>
                            <p>У вас є можливість керувати замовленнями.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="h-100 p-5 bg-light border rounded-3">
                            <img src="{{asset('img/goal/stripe.png')}}" alt="">
                            <h2>Отримання оплати за допомогою Stripe</h2>
                            <p>Stripe — американська технологічна компанія, що розробляє рішення для прийому і обробки електронних платежів. Компанія заснована 29 вересня 2011 року вихідцями з Ірландії братами Джоном і Патріком Коллісонами. Штаб квартира компанії розташована в Сан-Франциско (Каліфорнія).</p>
                            <hr>
                            <p>Компанія надає технічну і банківську інфраструктури для систем онлайн платежів.</p>
                            <hr>
                            <p>Використовуючи Stripe ви можете здійснювати платежі та приймати їх на свій Connect Stripe Account.</p>
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
                        <p class="col-md-8">Добавляйте товари в кошик, щоб їх замовити</p>
                        <hr>
                        <p class="col-md-8">Змінюйте кількість товару, яку хочете замовити</p>
                        <hr>
                        <p class="col-md-8">Виберіть тип оплати</p>
                    </div>
                </div>
                <div class="row align-items-md-stretch">
                    <div class="col-md-6">
                        <div class="h-100 p-5 text-white bg-dark rounded-3">
                            <img src="{{asset('img/goal/wishlist.png')}}" alt="">
                            <h2>Список бажаного</h2>
                            <p>Добавлення товарів в список бажаного допоможе вам не загубити свій бажаний товар</p>
                            <hr>
                            <p>У Вас є можливість один або одразу всі товари з списку бажаного перемістити в кошик.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="h-100 p-5 bg-light border rounded-3">
                            <img src="{{asset('img/goal/new-post.png')}}" alt="">
                            <h2>Отримання замовлення на відділення нової пошти</h2>
                            <p>Як покупець у Вас є можливість отримувати свої замовлення на відділення нової пошти</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
