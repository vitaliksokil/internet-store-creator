@extends('profile.layouts.profile-layout')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-auto mr-5" type="submit" href="{{route('profile.delivery.edit')}}">
                        <i class="fas fa-edit"></i> Редагувати
                    </a>
                </div>
            </nav>
            <div class="main-bar">
                <div class="container">
                    <section>
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-name"><h2>Адрес доставки</h2></div>
                                <div class="mb-3">
                                    <label for="area" class="form-label">Область</label>
                                    <input disabled type="text" class="form-control" id="area" name="area" required value="{{ $deliveryAddress->area ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">Місто</label>
                                    <input disabled type="text" class="form-control" id="city" name="city" required value="{{ $deliveryAddress->city ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="post_office" class="form-label">Відділення нової пошти</label>
                                    <input disabled type="text" class="form-control" id="post_office" name="post_office" required value="{{ $deliveryAddress->post_office ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_name" class="form-label">Ім'я отримувача</label>
                                    <input disabled type="text" class="form-control" id="client_name" name="client_name" required value="{{ $deliveryAddress->client_name ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_surname" class="form-label">Фамілія отримувача</label>
                                    <input disabled type="text" class="form-control" id="client_surname" name="client_surname" required value="{{ $deliveryAddress->client_surname ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_middlename" class="form-label">Ім'я по батькові отримувача</label>
                                    <input disabled type="text" class="form-control" id="client_middlename" name="client_middlename" required value="{{ $deliveryAddress->client_middlename ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_email" class="form-label">Email адрес</label>
                                    <input disabled type="text" class="form-control" id="client_email" name="client_email" required value="{{ $deliveryAddress->client_email ?? '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_phone_number" class="form-label">Номер телефону</label>
                                    <input disabled type="text" class="form-control" id="client_phone_number" name="client_phone_number" required value="{{ $deliveryAddress->client_phone_number ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
