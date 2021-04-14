@extends('welcome')

@section('main-content')
    <div class="slider">
        <div class="owl-carousel owl-theme">
            <div class="item"><img src="{{asset('img/slider/slide-1.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('img/slider/slide-2.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('img/slider/slide-3.jpg')}}" alt=""></div>
            <div class="item"><img src="{{asset('img/slider/slide-4.jpg')}}" alt=""></div>
        </div>
    </div>
    <div class="container">
        <div class="goal pt-10 pb-10">
            <div class="goal-title text-center">
                <h2>What we do?</h2>
            </div>
            <div class="goal-items mt-10">
                <div class="row justify-around ">
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/goal-1.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Title</h4>
                            <p>Description</p>
                        </div>
                    </div>
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/goal-1.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Title</h4>
                            <p>Description</p>
                        </div>
                    </div>
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/goal-1.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Title</h4>
                            <p>Description</p>
                        </div>
                    </div>

                </div>
                <hr class="mb-6 mt-6">
                <div class="row justify-around ">
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/goal-1.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Title</h4>
                            <p>Description</p>
                        </div>
                    </div>
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/goal-1.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Title</h4>
                            <p>Description</p>
                        </div>
                    </div>
                    <div class="col-4 flex align-middle justify-center">
                        <div class="col-4 d-flex align-middle justify-center"><img src="{{asset('img/goal/goal-1.png')}}" alt=""></div>
                        <div class="col-8">
                            <h4>Title</h4>
                            <p>Description</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="shops pt-10 pb-10">
        <div class="container">
            <div class="shops-title text-center mb-10">
                <h2>Our shops</h2>
            </div>
            <div class="shops-items">
                <div class="row">
                    @for($i=0;$i<8;$i++)
                        <div class="col-lg-3 mb-5">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('img/slider/slide-3.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

@endsection
