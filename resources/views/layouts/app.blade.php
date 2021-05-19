<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @php
        $shop = getShop();
        $siteSettings = isset($shop) ? $shop->settings : null;
        @endphp
        <style>
            {{--main{--}}
            {{--    background: {{$siteSettings->branding_color ?? '#ffb261'}} !important;--}}
            {{--}--}}
            header{
                background: {{$siteSettings->admin_header_bg_color ?? '#212529'}}  !important;
            }
            header a{
                color: {{$siteSettings->admin_header_color ?? '#212529'}}  !important;
            }
            table{
                background: {{$siteSettings->admin_tables_bg_color ?? '#cfe2ff'}}  !important;
                color: {{$siteSettings->admin_tables_color ?? '#000000'}}  !important;
            }
            #admin-menu .nav-link{
                color: {{$siteSettings->branding_second_color ?? '#212529'}} !important;
            }
            #admin-menu .active{
                background: {{$siteSettings->admin_menu_item_active_bg_color ?? '#ffb261'}} !important;
                color: {{$siteSettings->admin_menu_item_active_color ?? '#ffffff'}} !important;
            }
        </style>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
