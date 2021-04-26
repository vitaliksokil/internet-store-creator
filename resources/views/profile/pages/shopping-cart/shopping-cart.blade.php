@extends('profile.layouts.profile-layout')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-auto mr-5" type="submit" href="{{route('profile.info.edit')}}">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </nav>
            <div class="main-bar">
                <div class="container">
                    <section>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card wish-list mb-3">
                                    <div class="card-body">
                                        <h5 class="mb-4">Cart (<span>2</span> items)</h5>
                                        <div class="row mb-4">
                                            <div class="col-md-5 col-lg-3 col-xl-3">
                                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                                    <img class="img-fluid w-100"
                                                         src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-lg-9 col-xl-9">
                                                <div class="d-flex flex-column justify-content-between h-100">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5>Blue denim shirt</h5>
                                                            <p class="mb-3 text-muted text-uppercase small">Description</p>
                                                        </div>
                                                        <div>
                                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                                        class="minus"></button>
                                                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                        class="plus"></button>
                                                            </div>
                                                            <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                                Count
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center ">
                                                        <div>
                                                            <a href="#!" type="button" class=" btn btn-danger card-link-secondary small text-uppercase mr-3"><i
                                                                    class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                            <a href="#!" type="button" class="btn btn-danger  card-link-secondary small text-uppercase"><i
                                                                    class="fas fa-heart mr-1"></i> Move to wish list </a>
                                                        </div>
                                                        <p class="mb-0"><span><strong>$17.99</strong></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="row mb-4">
                                            <div class="col-md-5 col-lg-3 col-xl-3">
                                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                                    <img class="img-fluid w-100"
                                                         src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-lg-9 col-xl-9">
                                                <div>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5>Red hoodie</h5>
                                                            <p class="mb-3 text-muted text-uppercase small">Shirt - red</p>
                                                            <p class="mb-2 text-muted text-uppercase small">Color: red</p>
                                                            <p class="mb-3 text-muted text-uppercase small">Size: M</p>
                                                        </div>
                                                        <div>
                                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                                        class="minus"></button>
                                                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                        class="plus"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                                    class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                                                                    class="fas fa-heart mr-1"></i> Move to wish list </a>
                                                        </div>
                                                        <p class="mb-0"><span><strong>$35.99</strong></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="mb-4">Expected shipping delivery</h5>
                                        <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="mb-3">The total amount of</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                Prod 1
                                                <span>$25.98</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                Prod 1
                                                <span>$25.98</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                <div>
                                                    <strong>The total amount of</strong>
                                                </div>
                                                <span><strong>$53.98</strong></span>
                                            </li>
                                        </ul>
                                        <button type="button" class="btn btn-primary btn-block waves-effect waves-light">go to checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
