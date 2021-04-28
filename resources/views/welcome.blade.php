<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="">
    <header class="p-3 bg-dark text-white ">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="{{asset('img/logo.png')}}" width="70" alt="">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('profile.info') }}" class="btn btn-warning mr-3"><i class="fas fa-address-card"></i> Customer Profile</a>
                        <a href="{{ url('/dashboard') }}" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Seller Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        @auth
        <hr>
        <div class="container d-flex flex-wrap justify-content-end ">
            <a href="{{route('profile.wishlist')}}" class="btn btn-danger mr-3" id="wishlistCountBtn"><span class="span">{{getWishlistCount()}}</span> <i class="fas fa-heart"></i></a>
            <a href="{{route('profile.shopping-cart')}}" class="float-right btn btn-success" id="shoppingCartCountBtn"> <span class="span">{{getShoppingCartCount()}}</span> <i class="fas fa-shopping-cart"></i></a>
        </div>
        @endauth
    </header>
    <div class="" >
        @yield('main-content')
    </div>

    <footer class="footer-32892 pb-0">
        <div class="site-section">
            <div class="container">


                <div class="row">

                    <div class="col-md pr-md-5 mb-4 mb-md-0">
                        <h3>About Us</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque unde facere repellendus, odio et iste voluptatum aspernatur ratione mollitia tempora eligendi maxime est, blanditiis accusamus. Incidunt, aut, quis!</p>
                        <ul class="list-unstyled quick-info mb-4">
                            <li><a href="#" class="d-flex align-items-center"><span class="icon mr-3 icon-phone"></span> +1 291 3912 329</a></li>
                            <li><a href="#" class="d-flex align-items-center"><span class="icon mr-3 icon-envelope"></span> info@gmail.com</a></li>
                        </ul>

                        <form action="#" class="subscribe">
                            <input type="text" class="form-control" placeholder="Enter your e-mail">
                            <input type="submit" class="btn btn-submit" value="Send">
                        </form>
                    </div>
                    <div class="col-md mb-4 mb-md-0">
                        <h3>Latest Tweet</h3>
                        <ul class="list-unstyled tweets">
                            <li class="d-flex">
                                <div class="mr-4"><span class="icon icon-twitter"></span></div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere unde omnis veniam porro excepturi.</div>
                            </li>
                            <li class="d-flex">
                                <div class="mr-4"><span class="icon icon-twitter"></span></div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere unde omnis veniam porro excepturi.</div>
                            </li>
                            <li class="d-flex">
                                <div class="mr-4"><span class="icon icon-twitter"></span></div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere unde omnis veniam porro excepturi.</div>
                            </li>
                        </ul>
                    </div>


                    <div class="col-md-3 mb-4 mb-md-0">
                        <h3>Instagram</h3>
                        <div class="row gallery">
                            <div class="col-6">
                                <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
                                <a href="#"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-6">
                                <a href="#"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
                                <a href="#"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="py-5 footer-menu-wrap d-md-flex align-items-center">
                            <ul class="list-unstyled footer-menu mr-auto">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Our works</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                            <div class="site-logo-wrap ml-auto">
                                <a href="#" class="site-logo">
                                    Colorlib
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    </body>
</html>
