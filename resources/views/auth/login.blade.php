@extends('layouts.master-without-nav')

@section('content')
<!-- Begin page -->
@php
$main_data = App\MainData::first();
@endphp
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center m-0">
                <img src="{{ url('uploads/'.$main_data->logo) }}" style="width:300px;height:200px;" alt="logo">

            </h3>

            <h3 class="text-center m-0">

                <strong>{{$main_data->name_en}}</strong>
            </h3>


            <div class="p-3">
                <h3 class="text font-18 m-b-5 text-center">{{$main_data->name_ar}}</h3>
                <form method="POST" action="{{ route('login') }}" class="form-horizontal m-t-30">
                    @csrf
                    @include('layouts.errors')
                    <div class="form-group">
                        <label for="username">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter E-mail">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $message }}</strong>
                        </span>
                        @enderror


                    </div>

                    <div class="form-group">
                        <label for="userpassword">Password</label>

                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>


</div>
@endsection

@section('script')

@endsection