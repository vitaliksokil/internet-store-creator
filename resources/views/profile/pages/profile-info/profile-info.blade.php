@extends('profile.layouts.profile-layout')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-auto mr-5" type="submit" href="{{route('profile.info.edit')}}">
                        <i class="fas fa-edit"></i> Редагувати
                    </a>
                </div>
            </nav>

            <div class="main-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar">
                                <img src="{{$user->img}}" alt="">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="shop-name"><h1>{{$user->name}}</h1></div>
                            <div class="shop-link">
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
