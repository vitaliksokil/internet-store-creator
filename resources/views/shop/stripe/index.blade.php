@extends('shop.main')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
{{--            <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--                <div class="collapse navbar-collapse">--}}
{{--                    <a class="btn btn-primary ml-auto mr-5" type="submit" href="{{route('settings.edit')}}">--}}
{{--                        <i class="fas fa-edit"></i> Edit--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </nav>--}}

            <div class="main-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-name"><h2>Stripe Connect</h2></div>
                            @if($stripeConnectedEmail)
                                <div class="mb-3">
                                    <div class="alert alert-success" role="alert">
                                        You have connected Stripe Account with email: <b>{{$stripeConnectedEmail}}</b>
                                    </div>
                                    <a href="https://dashboard.stripe.com/" class="btn stripe-connect-btn" target="_blank">
                                        <img src="{{asset('img/stripe.png')}}" alt="">
                                        Go to your Stripe Account
                                    </a>
                                </div>
                            @else
                                <div class="mb-3">
                                    <div class="alert alert-info" role="alert">
                                        You don't have connected Stripe account. Please connect it for accepting online payments!
                                    </div>
                                    <a href="{{route('shop.stripe.connect')}}" class="btn stripe-connect-btn">
                                        <img src="{{asset('img/stripe.png')}}" alt="">
                                        Connect With Stripe
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
