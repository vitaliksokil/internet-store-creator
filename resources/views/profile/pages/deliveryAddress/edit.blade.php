@extends('profile.layouts.profile-layout')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-5" type="submit" href="{{route('profile.delivery.get')}}">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </nav>
            <div class="main-bar">
                <div class="container">
                    <section>
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shop-name"><h2>Delivery address</h2></div>
                                    <div class="mb-3">
                                        <label for="area" class="form-label">Area</label>
                                        <select id="area" name="area" class="form-control" >
                                            <option value="">Select Area</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->ref}}" data-get-city-url="{{route('profile.delivery.get.cities',['area_ref'=>$area->ref])}}">{{$area->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" id="city" name="city" list="cityname" class="form-control">
                                        <datalist id="cityname">

                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="post_office" class="form-label">Post Office</label>
                                        <select id="post_office" name="post_office" class="form-control"></select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="client_name" name="client_name" required value="{{ '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_surname" class="form-label">Surname</label>
                                        <input type="text" class="form-control" id="client_surname" name="client_surname" required value="{{ '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_middlename" class="form-label">Middle name</label>
                                        <input type="text" class="form-control" id="client_middlename" name="client_middlename" required value="{{ '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="client_email" name="client_email" required value="{{ '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_phone_number" class="form-label">Phone number</label>
                                        <input type="text" class="form-control" id="client_phone_number" name="client_phone_number" required value="{{ '' }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        let apiKey = "{{config('app.new_post_api_key')}}";
        let endPoint = "{{config('app.new_post_endpoint')}}";

        document.addEventListener("DOMContentLoaded", function(event) {
            $( document ).ready(function() {
                $('#area').on('change',function(e){
                    let area = this.value
                    $.ajax({
                        url: '/profile/delivery-address/get-cities/'+area,
                        method: 'GET',
                        success: response => {
                            let cities = response
                            let html = '';
                            for (const city of cities) {
                                html += `<option>${city.description}</option>`
                            }
                            $('#cityname').html(html)
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                });
            });
        });
    </script>
@endsection

