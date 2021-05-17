@extends('profile.layouts.profile-layout')

@section('main')
    <section id="categories-index">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">

            </div>
        </nav>

        @include('session_messages.error_403')
        @include('session_messages.message')

        <h3>Замовлення</h3>
        <table class="table table-primary text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Магазин</th>
                <th scope="col">Загальна ціна</th>
                <th scope="col">Метод оплати</th>
                <th scope="col">Статус оплати</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата створення</th>
                <th scope="col">Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
            <tr >
                <th scope="row">{{$order->id}}</th>
                <td><a href="{{route('shop.show',['shop'=>$order->shop])}}"><img src="{{$order->shop->img}}" class="img-table d-inline mr-3" alt="">{{$order->shop->name}}</a></td>
                <td>{{formatPrice($order->total_price)}}$</td>
                <td>{!! \App\Models\Order::PAYMENT_TYPES[$order->payment_type] !!}</td>
                <td>{!! \App\Models\Order::IS_PAID_ICONS[$order->is_paid] !!}</td>
                <td>{!! \App\Models\Order::STATUS_ICONS[$order->status] !!}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <form class="mb-2">
                        <a href="{{route('profile.orders.show',['order'=>$order])}}" class="btn btn-primary ml-auto mr-5 w-100"><i class="fas fa-eye"></i> Переглянути замовлення </a>
                    </form>
                    @if(!$order->status)
                        <form method="post" action="{{route('profile.orders.delete',['order'=>$order])}}" class="mb-2" onsubmit="return confirm('Ви впевнені, що хочете видалити дане замовлення?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100"><i class="fas fa-trash-alt"></i>Скасувати</button>
                        </form>
                    @endif
                </td>
            </tr>
            @empty
                <tr>
                    <th scope="row">
                        Немає замовлень
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            @endforelse
            </tbody>
        </table>
                {{$orders->links()}}
    </section>
@endsection
