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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group list-group-flush mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <form action="{{route('profile.delivery.update')}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="shop-name"><h2>Delivery address</h2></div>
                                    <div class="mb-3">
                                        <label for="area" class="form-label">Area</label>
                                        <select id="area" name="area" class="form-control" >
                                            <option value="">Select Area</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->ref}}"
                                                        data-get-city-url="{{route('profile.delivery.get.cities',['area_ref'=>$area->ref])}}"
                                                        {{isset($deliveryAddress) && $deliveryAddress->area == $area->description ? 'selected' : '' }}
                                                >
                                                    {{$area->description}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" id="city" name="city" list="cityname" class="form-control" value="{{$deliveryAddress->city ?? ''}}">
                                        <datalist id="cityname">

                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="post_office" class="form-label">Post Office</label>
                                        <input type="text" id="post_office" name="post_office" list="warehouses" class="form-control" value="{{$deliveryAddress->post_office ?? ''}}">
                                        <datalist id="warehouses">

                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="client_name" name="client_name" required value="{{$deliveryAddress->client_name ?? ''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_surname" class="form-label">Surname</label>
                                        <input type="text" class="form-control" id="client_surname" name="client_surname" required value="{{$deliveryAddress->client_surname ?? ''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_middlename" class="form-label">Middle name</label>
                                        <input type="text" class="form-control" id="client_middlename" name="client_middlename" required value="{{$deliveryAddress->client_middlename ?? ''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="client_email" name="client_email" required value="{{$deliveryAddress->client_email ?? ''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client_phone_number" class="form-label">Phone number(Example: +380981234123 )</label>
                                        <input type="text" class="form-control" id="client_phone_number" name="client_phone_number" required value="{{$deliveryAddress->client_phone_number ?? ''}}" placeholder="+380981234123">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a href="{{route('profile.delivery.get')}}" class="btn btn-danger">Cancel</a>
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
                    $('#city').val('')
                    $('#post_office').val('')
                    let area = this.value
                    $.ajax({
                        url: '/profile/delivery-address/get-cities/'+area,
                        method: 'GET',
                        success: response => {
                            let cities = response
                            let html = '';
                            for (const city of cities) {
                                html += `<option id="${city.ref}" value="${city.description}" />`
                            }
                            $('#cityname').html(html)
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                });
                $('#city').on('change',function(e){
                    $('#post_office').val('')
                    let city = this.value
                    var opt = $('option[value="'+city+'"]');
                    let cityId = opt.attr('id')
                    $.ajax({
                        url: '/profile/delivery-address/get-warehouses/' + cityId,
                        method: 'GET',
                        success: response => {
                            let warehouses = response
                            let html = '';
                            for (const warehouse of warehouses) {
                                html += `<option>${warehouse.description}</option>`
                            }
                            $('#warehouses').html(html)
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

