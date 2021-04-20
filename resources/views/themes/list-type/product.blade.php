@extends('welcome')
@section('main-content')
    {{--    <div class="slider">--}}
    {{--        <div class="owl-carousel owl-theme">--}}
    {{--            <div class="item"><img src="{{asset('img/slider/slide-1.jpg')}}" alt=""></div>--}}
    {{--            <div class="item"><img src="{{asset('img/slider/slide-2.jpg')}}" alt=""></div>--}}
    {{--            <div class="item"><img src="{{asset('img/slider/slide-3.jpg')}}" alt=""></div>--}}
    {{--            <div class="item"><img src="{{asset('img/slider/slide-4.jpg')}}" alt=""></div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="shops pt-10 pb-10">
        <div class="container">
            <div class="shops-items">
                <div class="row">
                    <div class="col-md-8">
                        <div class="content-wrapper">
                            <div class="item-container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <img class="w-100" src="{{asset('images/img_1.jpg')}}" alt="">
                                        </div>

                                        <div class="col-7">
                                            <div class="product-title">Corsair GS600 600 Watt PSU</div>
                                            <div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>
                                            <div class="product-rating">
                                                <i class="fas fa-star gold"></i>
                                                <i class="fas fa-star gold"></i>
                                                <i class="fas fa-star gold"></i>
                                                <i class="fas fa-star gold"></i>
                                                <i class="fas fa-star gold"></i>
                                            </div>
                                            <hr>
                                            <div class="product-price">$ 1234.00</div>
                                            <div class="product-stock">In Stock</div>
                                            <hr>
                                            <div class="btn-group cart">
                                                <button type="button" class="btn btn-success">
                                                    {{--                                                <i class="fas fa-shopping-cart"></i> {{$product->price}}$--}}
                                                    <i class="fas fa-shopping-cart"></i> 10$
                                                </button>
                                            </div>
                                            <div class="btn-group wishlist">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 card text-center mt-5">
                                        <div class="bd-example">
                                            <nav>
                                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Feedbacks</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <p>Placeholder content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.</p>
                                                </div>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    <p>Placeholder content for the tab panel. This one relates to the profile tab. You got the finest architecture. Passport stamps, she's cosmopolitan. Fine, fresh, fierce, we got it on lock. Never planned that one day I'd be losing you. She eats your heart out. Your kiss is cosmic, every move is magic. I mean the ones, I mean like she's the one. Greetings loved ones let's take a journey. Just own the night like the 4th of July! But you'd rather get wasted.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="p-4 mb-3 bg-light rounded">
                            <h4 class="fst-italic">About</h4>
                            <p class="mb-0">Saw you downtown singing the Blues. Watch you circle the drain. Why don't you let me stop by? Heavy is the head that <em>wears the crown</em>. Yes, we make angels cry, raining down on earth from up above.</p>
                        </div>

                        <div class="p-4">
                            <h4 class="fst-italic">Archives</h4>
                            <ol class="list-unstyled mb-0">
                                <li><a href="#">March 2014</a></li>
                                <li><a href="#">February 2014</a></li>
                                <li><a href="#">January 2014</a></li>
                                <li><a href="#">December 2013</a></li>
                                <li><a href="#">November 2013</a></li>
                                <li><a href="#">October 2013</a></li>
                                <li><a href="#">September 2013</a></li>
                                <li><a href="#">August 2013</a></li>
                                <li><a href="#">July 2013</a></li>
                                <li><a href="#">June 2013</a></li>
                                <li><a href="#">May 2013</a></li>
                                <li><a href="#">April 2013</a></li>
                            </ol>
                        </div>

                        <div class="p-4">
                            <h4 class="fst-italic">Elsewhere</h4>
                            <ol class="list-unstyled">
                                <li><a href="#">GitHub</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Facebook</a></li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
