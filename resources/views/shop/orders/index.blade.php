@extends('shop.main')

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
                <th scope="col">Покупець</th>
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
                    <td><img src="{{$order->user->img}}" class="img-table d-inline mr-3" alt="">{{$order->user->name}}</td>
                    <td>{{formatPrice($order->total_price)}}$</td>
                    <td>{!! \App\Models\Order::PAYMENT_TYPES[$order->payment_type] !!}</td>
                    <td>{!! \App\Models\Order::IS_PAID_ICONS[$order->is_paid] !!}</td>
                    <td>{!! \App\Models\Order::STATUS_ICONS[$order->status] !!}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <a href="{{route('shop.orders.show',['order'=>$order])}}" class="btn btn-primary ml-auto mr-5"><i class="fas fa-eye"></i> Переглянути замовлення </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">
                        No orders!
                    </th>
                    <td></td>
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
