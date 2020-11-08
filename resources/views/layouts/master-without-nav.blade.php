<!DOCTYPE html>
<html>

<head>

    @php
    $main_data = App\MainData::first();
    @endphp
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    @include('layouts.head')
    <title>{{$main_data->name_ar}}</title>

</head>

<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    @yield('content')
    @include('layouts.footer-script')
</body>

</html>