@extends('profile.layouts.profile-layout')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-auto mr-5" type="submit" href="{{route('profile.delivery.edit')}}">
                        <i class="fas fa-edit"></i> Edit
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
                                <div class="shop-name"><h2>Delivery address</h2></div>
                                <div class="mb-3">
                                    <label for="area" class="form-label">Area</label>
                                    <input disabled type="text" class="form-control" id="area" name="area" required value="{{ '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input disabled type="text" class="form-control" id="city" name="city" required value="{{ '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="post_office" class="form-label">Post Office</label>
                                    <input disabled type="text" class="form-control" id="post_office" name="post_office" required value="{{ '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_name" class="form-label">Name</label>
                                    <input disabled type="text" class="form-control" id="client_name" name="client_name" required value="{{ '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_surname" class="form-label">Surname</label>
                                    <input disabled type="text" class="form-control" id="client_surname" name="client_surname" required value="{{ '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_middlename" class="form-label">Middle name</label>
                                    <input disabled type="text" class="form-control" id="client_middlename" name="client_middlename" required value="{{ '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_email" class="form-label">Email</label>
                                    <input disabled type="text" class="form-control" id="client_email" name="client_email" required value="{{ '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="client_phone_number" class="form-label">Phone number</label>
                                    <input disabled type="text" class="form-control" id="client_phone_number" name="client_phone_number" required value="{{ '' }}">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
