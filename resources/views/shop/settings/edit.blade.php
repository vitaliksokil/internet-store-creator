@extends('shop.main')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-5" type="submit" href="{{route('settings.index')}}">
                        <i class="fas fa-arrow-left"></i> Назад
                    </a>
                </div>
            </nav>

            <div class="main-bar">
                <div class="container">
                    <div class="row">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group list-group-flush mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{route('settings.update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="shop-name"><h2>Брендові кольора</h2></div>
                            <div class="mb-3">
                                <label for="branding_color" class="form-label">Брендовий колір *</label>
                                <input type="color" class="form-control" id="branding_color" name="branding_color" required value="{{ $settings->branding_color }}">
                            </div>
                            <div class="mb-3">
                                <label for="branding_second_color" class="form-label">Другорядний брендовий колір *</label>
                                <input type="color" class="form-control" id="branding_second_color" name="branding_second_color" required value="{{ $settings->branding_second_color }}">
                            </div>
                            <hr>
                            <div class="shop-name"><h2>Кольора адмін панелі</h2></div>
                            <div class="mb-3">
                                <label for="admin_menu_item_active_bg_color" class="form-label">Фоновий колір активного елементу меню *</label>
                                <input type="color" class="form-control" id="admin_menu_item_active_bg_color" name="admin_menu_item_active_bg_color" required value="{{ $settings->admin_menu_item_active_bg_color }}">
                            </div>
                            <div class="mb-3">
                                <label for="admin_menu_item_active_color" class="form-label">Колір тексту активного елементу меню *</label>
                                <input type="color" class="form-control" id="admin_menu_item_active_color" name="admin_menu_item_active_color" required value="{{ $settings->admin_menu_item_active_color }}">
                            </div>
                            <div class="mb-3">
                                <label for="admin_header_bg_color" class="form-label">Фоновий колір шапки *</label>
                                <input type="color" class="form-control" id="admin_header_bg_color" name="admin_header_bg_color" required value="{{ $settings->admin_header_bg_color }}">
                            </div>
                            <div class="mb-3">
                                <label for="admin_header_color" class="form-label">Колір тексту шапки *</label>
                                <input type="color" class="form-control" id="admin_header_color" name="admin_header_color" required value="{{ $settings->admin_header_color }}">
                            </div>
                            <div class="mb-3">
                                <label for="admin_tables_bg_color" class="form-label">Фоновий колір таблиць *</label>
                                <input type="color" class="form-control" id="admin_tables_bg_color" name="admin_tables_bg_color" required value="{{ $settings->admin_tables_bg_color }}">
                            </div>
                            <div class="mb-3">
                                <label for="admin_tables_color" class="form-label">Колір тексту таблиць *</label>
                                <input type="color" class="form-control" id="admin_tables_color" name="admin_tables_color" required value="{{ $settings->admin_tables_color }}">
                            </div>
                            <hr>
                            <div class="shop-name"><h2>Кольора магазину</h2></div>
                            <div class="mb-3">
                                <label for="shop_bg_color" class="form-label">Фоновий колір магазину *</label>
                                <input type="color" class="form-control" id="shop_bg_color" name="shop_bg_color" required value="{{ $settings->shop_bg_color }}">
                            </div>


                            <button type="submit" class="btn btn-primary">Підтвердити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
