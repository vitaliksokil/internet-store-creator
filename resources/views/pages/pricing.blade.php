@extends('welcome')

@section('main-content')
    <div class="container py-3">
        <header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">Ціни за функціонал</h1>
                <p class="fs-5 text-muted">На даному етапі у нас весь функціонал безкоштовний і немає планів підписок.
                    Нижче ви можете бачити ціни за окремі функції</p>
            </div>
        </header>

        <main>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th style="width: 34%;" class="text-start">Функція</th>
                        <th style="width: 22%;">Ціна</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="text-start">Створення магазину</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Добавлення категорій</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Добавлення товарів</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Налаштування кольорів</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Вибір теми</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Операції із замовленнями</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Керування відгуками</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Підключення Stripe акаунта</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Створення замовлення</th>
                        <td>0</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </main>

    </div>
@endsection
