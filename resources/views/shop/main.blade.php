@php
$shop = getShop()
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($shop->name) }}
        </h2>
    </x-slot>
    <section id="admin-menu">
        <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">{{$shop->name}}</a>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('shop.index') || request()->routeIs('shop.edit') ? 'active' : ''}}" aria-current="page" href="{{route('shop.index')}}">
                                    <i class="fas fa-home"></i>
                                    Домашня сторінка
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('category.index') || request()->routeIs('category.create') || request()->routeIs('category.edit') ? 'active' : ''}}" aria-current="page" href="{{route('category.index')}}">
                                    <i class="fas fa-th-large"></i>
                                    Категорії
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('product.index') ||
                                                    request()->routeIs('product.create') ||
                                                    request()->routeIs('category.products') ||
                                                    request()->routeIs('product.edit') ? 'active' : ''}}" aria-current="page" href="{{route('product.index')}}">
                                    <i class="fas fa-quidditch"></i>
                                    Товари
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('settings.index') ||
                                                    request()->routeIs('settings.edit') ? 'active' : ''}}" aria-current="page" href="{{route('settings.index')}}">
                                    <i class="fas fa-sliders-h"></i>
                                    Налаштування
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('shop.theme.index') ||
                                                    request()->routeIs('shop.theme.edit') ? 'active' : ''}}" aria-current="page" href="{{route('shop.theme.index')}}">
                                    <i class="fas fa-palette"></i>
                                    Теми
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('shop.orders.index')
                                        || request()->routeIs('shop.orders.show') ||
                                           request()->routeIs('shop.orders.edit') ? 'active' : ''}}" aria-current="page" href="{{route('shop.orders.index')}}">
                                    <i class="fas fa-truck-loading"></i>
                                    Замовлення
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('shop.feedbacks.index') || request()->routeIs('shop.feedbacks.index')   ? 'active' : ''}}" aria-current="page" href="{{route('shop.feedbacks.index')}}">
                                    <i class="fas fa-comments"></i>
                                    Відгуки
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('shop.stripe.index')  ? 'active' : ''}}" aria-current="page" href="{{route('shop.stripe.index')}}">
                                    <i class="fas fa-money-check-alt"></i>
                                    Stripe Connect
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    @yield('main')
                </main>
            </div>
        </div>
    </section>

</x-app-layout>

