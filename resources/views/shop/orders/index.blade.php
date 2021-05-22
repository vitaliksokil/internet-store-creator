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
                    <td>{{formatPrice($order->total_price)}}{{$order->shop->currency}}</td>
                    <td>{!! \App\Models\Order::PAYMENT_TYPES[$order->payment_type] !!}</td>
                    <td>{!! \App\Models\Order::IS_PAID_ICONS[$order->is_paid] !!}</td>
                    <td>{!! \App\Models\Order::STATUS_ICONS[$order->status] !!}</td>
                    <td>{{$order->created_at}}</td>
                    <td class="d-flex flex-column">
                        <form class="mb-2">
                            <a href="{{route('shop.orders.show',['order'=>$order])}}" class="w-100 btn btn-info ml-auto mr-5"><i class="fas fa-eye"></i> Переглянути замовлення </a>
                        </form>
                        <form class="mb-2">
                            <a href="{{route('shop.orders.edit',['order'=>$order])}}" class="w-100 btn btn-primary ml-auto mr-5"><i class="fas fa-edit"></i> Редагувати замовлення </a>
                        </form>
                        <form action="{{route('shop.orders.confirm',['order'=>$order])}}" class="mb-2" method="post" onsubmit="return confirm('Ви впевнені, що хочете підтвердити дане замовлення?')">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success w-100" {{$order->status ? 'disabled' : ''}}><i class="fas fa-check"></i>Підтвердити</button>
                        </form>
                        <form method="post" action="{{route('shop.orders.delete',['order'=>$order])}}" class="mb-2" onsubmit="return confirm('Ви впевнені, що хочете видалити дане замовлення?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100"><i class="fas fa-trash-alt"></i>Видалити</button>
                        </form>

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
                    <td></td>
                </tr>

            @endforelse
            </tbody>
        </table>
        {{$orders->links()}}
    </section>
@endsection
