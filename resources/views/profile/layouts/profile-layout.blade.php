@php
$user = auth()->user()
@endphp
<x-app-layout>
    <section id="admin-menu">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">{{$user->name}}</a>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('profile.info') || request()->routeIs('profile.info.edit') ? 'active' : ''}}"
                                   aria-current="page" href="{{route('profile.info')}}">
                                    <i class="fas fa-address-card"></i>
                                    Інформація профілю
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('profile.shopping-cart') ? 'active' : ''}}"
                                   aria-current="page" href="{{route('profile.shopping-cart')}}">
                                    <i class="fas fa-shopping-cart"></i>
                                    Корзина
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('profile.wishlist') ? 'active' : ''}}"
                                   aria-current="page" href="{{route('profile.wishlist')}}">
                                    <i class="fas fa-heart"></i>
                                    Список бажаного
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('profile.delivery.get') || request()->routeIs('profile.delivery.edit') ? 'active' : ''}}"
                                   aria-current="page" href="{{route('profile.delivery.get')}}">
                                    <i class="fas fa-truck"></i>
                                    Адрес доставки
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('profile.orders.get') || request()->routeIs('profile.orders.show')  ? 'active' : ''}}"
                                   aria-current="page" href="{{route('profile.orders.get')}}">
                                    <i class="fas fa-truck-loading"></i>
                                    Замовлення
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-5"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    @yield('main')
                </main>
            </div>
        </div>
    </section>

</x-app-layout>

