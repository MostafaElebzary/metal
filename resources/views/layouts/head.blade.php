
 
@php 
$maindata = App\MainData::first();
@endphp
<link rel="shortcut icon" href="{{ URL::asset('uploads/'.$maindata->logo) }}">


@yield('css')

<!-- Basic Css files -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('front/css/icons.css')}}" rel="stylesheet" />

<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
  
<style>
body {
    font-family: 'Cairo';font-size: 18px;
} 

label{
    font-family: 'Cairo';font-size: 18px;

}
 

table ,td,th{
    font-family: 'Cairo';font-size: 18px;

}
</style>