<!DOCTYPE html>
<html>
    <head>

@php
$main_data = App\MainData::first();
@endphp
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{{$main_data->name_ar}}</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        @include('layouts.head')
    </head>
    @if(session('lang')=='en')
    <body >
    @else
    <body dir="rtl" >

    @endif

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <div id="wrapper">
        @include('layouts.header')
        <div class="wrapper">
            <div class="container-fluid">
                @yield('breadcrumb')
                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </div>
    @include('layouts.footer-script')

    @stack('js')

</body>
</html>
