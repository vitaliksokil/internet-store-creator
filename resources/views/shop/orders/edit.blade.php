@extends('shop.main')

@section('main')
    <section class="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-5" type="submit" href="{{route('shop.orders.index')}}">
                        <i class="fas fa-arrow-left"></i> Назад
                    </a>
                </div>
            </nav>

            <div class="main-bar">
                <div class="container">
                    <div class="row">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group list-group-flush mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3>Редагувати замовлення № {{$order->id}}</h3>
                        <form method="post" action="{{route('shop.orders.update',['order'=>$order])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">#</label>
                                <input type="text" class="form-control" disabled value="{{ $order->id }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Загальна ціна {{$order->shop->currency}}</label>
                                <input type="text" class="form-control" disabled value="{{ $order->total_price }}">
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Метод оплати</label>
                                <select name="payment_type" class="form-control">
                                    <option value="1" {{$order->payment_type == \App\Models\Order::ONLINE_PAYMENT_TYPE ? 'selected' : ''}}>Онлайн оплата</option>
                                    <option value="2" {{$order->payment_type == \App\Models\Order::OFFLINE_PAYMENT_TYPE ? 'selected' : ''}}>Оплата накладеним платежом</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Статус оплати</label>
                                <select name="is_paid" class="form-control">
                                    <option value="1" {{$order->is_paid ? 'selected' : ''}}>Оплачено</option>
                                    <option value="0" {{!$order->is_paid ? 'selected' : ''}}>Не оплачено</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Статус</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{$order->status ? 'selected' : ''}}>Підтверджено</option>
                                    <option value="0" {{!$order->status ? 'selected' : ''}}>Не Підтверджено</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Підтвердити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
