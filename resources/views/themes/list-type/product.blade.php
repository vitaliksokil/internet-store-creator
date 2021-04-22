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
                                            <img class="w-100" src="{{$product->img}}" alt="">
                                        </div>

                                        <div class="col-7">
                                            <div class="product-title">{{$product->title}}</div>
{{--                                            <div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>--}}
                                            <div class="product-rating">
                                                <i class="fas fa-star gold"></i>
                                                <i class="fas fa-star gold"></i>
                                                <i class="fas fa-star gold"></i>
                                                <i class="fas fa-star gold"></i>
                                                <i class="fas fa-star gold"></i>
                                            </div>
                                            <hr>
                                            <div class="product-price">{{number_format($product->price,2,',',' ')}}{{\App\Models\Shop\Product::CURRENCIES[$product->currency]}}</div>
{{--                                            <div class="product-stock">In Stock</div>--}}
                                            <hr>
                                            <div class="btn-group cart">
                                                <button type="button" class="btn btn-success">
                                                    {{--                                                <i class="fas fa-shopping-cart"></i> {{$product->price}}$--}}
                                                    <i class="fas fa-shopping-cart"></i> {{number_format($product->price,2,',',' ')}}{{\App\Models\Shop\Product::CURRENCIES[$product->currency]}}
                                                </button>
                                            </div>
                                            <div class="btn-group wishlist">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 card  mt-5">
                                        <div class="bd-example">
                                            <nav>
                                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Feedbacks</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade active show p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <p>{{$product->description}}</p>
                                                </div>
                                                <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    @forelse($feedbacks as $feedback)
                                                        <div class="card mb-3">
                                                            <div class="row g-0">
                                                                <div class="col-12">
                                                                    <div class="card-body d-flex justify-content-between">
                                                                        <div class="card-body-header">
                                                                            <h6 class="card-title">{{$feedback->user->name}}</h6>
                                                                            <p class="card-text" style="font-size: 15px">
                                                                                @for($i=0;$i<$feedback->rate;$i++)
                                                                                    <i class="fas fa-star gold"></i>
                                                                                @endfor
                                                                                @for($i=0;$i<5-$feedback->rate;$i++)
                                                                                    <i class="fas fa-star"></i>
                                                                                @endfor
                                                                            </p>
                                                                        </div>
                                                                        <div class="card-body-body">

                                                                            <p class="card-text" style="font-size: 15px">{{$feedback->text}}</p>
                                                                            <p class="card-text"><small class="text-muted">{{date('F j, Y, g:i a',strtotime($feedback->created_at))}}</small></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        No feedbacks
                                                    @endforelse
                                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Feedback</button>
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Leave your feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection
