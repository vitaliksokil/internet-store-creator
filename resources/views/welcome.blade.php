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
        @php
            $siteSettings = isset($shop) ? $shop->settings : null;
        @endphp
        <style>
            .shops{
                background: {{$siteSettings->shop_bg_color ?? '#f8f9fa'}} !important;;
            }
        </style>
    </head>
    <body class="">
    <header class="p-3 bg-dark text-white ">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="{{asset('img/logo.png')}}" width="70" alt="">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 {{request()->routeIs('home') ? 'text-secondary' : 'text-white'}}">Домашня сторінка</a></li>
                    <li><a href="{{route('features')}}" class="nav-link px-2 {{request()->routeIs('features') ? 'text-secondary' : 'text-white'}} ">Можливості</a></li>
                    <li><a href="{{route('pricing')}}" class="nav-link px-2 {{request()->routeIs('pricing') ? 'text-secondary' : 'text-white'}}">Ціни</a></li>
                    <li><a href="{{route('faqs')}}" class="nav-link px-2 {{request()->routeIs('faqs') ? 'text-secondary' : 'text-white'}}">FAQs</a></li>
                    <li><a href="{{route('about')}}" class="nav-link px-2 {{request()->routeIs('about') ? 'text-secondary' : 'text-white'}}">Про сайт</a></li>
                </ul>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('profile.info') }}" class="btn btn-warning mr-3"><i class="fas fa-address-card"></i>Профіль покупця</a>
                        <a href="{{ url('/dashboard') }}" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Профіль продавця</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Логін</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning">Регістрація</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        <hr>
        <div class="container d-flex flex-wrap justify-content-between">
            <div>
                <a href="@yield('back-link',\Illuminate\Support\Facades\URL::previous())" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Назад</a>
            </div>
            @auth
                <div>
                    <a href="{{route('profile.wishlist')}}" class="btn btn-danger mr-3" id="wishlistCountBtn"><span class="span">{{getWishlistCount()}}</span> <i class="fas fa-heart"></i></a>
                    <a href="{{route('profile.shopping-cart')}}" class="float-right btn btn-success" id="shoppingCartCountBtn"> <span class="span">{{getShoppingCartCount()}}</span> <i class="fas fa-shopping-cart"></i></a>
                </div>
            @endauth
        </div>
    </header>
    <div class="" >
        @yield('main-content')
    </div>

    <footer class="footer-32892 pb-0">
        <div class="site-section">
            <div class="container">


                <div class="row">

                    <div class="col-md pr-md-5 mb-4 mb-md-0">
                        <h3>Про Cайт</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque unde facere repellendus, odio et iste voluptatum aspernatur ratione mollitia tempora eligendi maxime est, blanditiis accusamus. Incidunt, aut, quis!</p>
                    </div>
                    <div class="col-md mb-4 mb-md-0">
                        <h3>Про творця</h3>
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
                        <ul class="list-unstyled quick-info mb-4">
                            <li><a href="#" class="d-flex align-items-center"><span class="icon mr-3 icon-phone"></span>+380 98 6225 367</a></li>
                            <li><a href="#" class="d-flex align-items-center"><span class="icon mr-3 icon-envelope"></span> vitaliksokil200@gmail.com</a></li>
                        </ul>
                    </div>

                    <div class="col-12">
                        <hr>
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                                <li><a href="/" class="nav-link px-2 {{request()->routeIs('home') ? 'text-secondary' : 'text-white'}}">Домашня сторінка</a></li>
                                <li><a href="{{route('features')}}" class="nav-link px-2 {{request()->routeIs('features') ? 'text-secondary' : 'text-white'}} ">Можливості</a></li>
                                <li><a href="{{route('pricing')}}" class="nav-link px-2 {{request()->routeIs('pricing') ? 'text-secondary' : 'text-white'}}">Ціни</a></li>
                                <li><a href="{{route('faqs')}}" class="nav-link px-2 {{request()->routeIs('faqs') ? 'text-secondary' : 'text-white'}}">FAQs</a></li>
                                <li><a href="{{route('about')}}" class="nav-link px-2 {{request()->routeIs('about') ? 'text-secondary' : 'text-white'}}">Про сайт</a></li>
                            </ul>
                            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                                <img src="{{asset('img/logo.png')}}" width="70" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    </body>
</html>
