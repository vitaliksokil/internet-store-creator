@extends('profile.layouts.profile-layout')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <div class="main-bar">
                <div class="container">
                    <h1>Підтвердження оплати</h1>

                    @include('session_messages.error_403')
                    @include('session_messages.message')

                    <section>
                        <button  class="btn stripe-connect-btn" id="stripe_pay" data-checkout="{{$checkout}}">
                            <img src="{{asset('img/stripe.png')}}" alt="">
                            Оплатити
                        </button>
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        $('#stripe_pay').on('click',function(){
            const stripe = Stripe('{{config('stripe.stripe_key')}}',{
                stripeAccount: '{{$shop->account_id}}',
            });
            let checkout = $(this).attr('data-checkout');
            const result = stripe.redirectToCheckout({
                sessionId: checkout,
            });
        })
    });
</script>
