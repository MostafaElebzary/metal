@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<!-- Page-Title -->
<br>
<div class="app-content content container-fluid">
    <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                {{trans('admin.transactions')}}
            </li>
            <li class="breadcrumb-item"><a href="{{ url('thirdparty')}}"> {{trans('admin.thirdparty')}}

                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.createthirdparty')}}
            </li>

        </ol>
    </div>
</div>
<!-- end page title end breadcrumb -->
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        @include('layouts.errors')

        <div class="card m-b-20">
            <div class="card-body">

                {{ Form::open( ['url' => ['thirdparty'],'method'=>'post'] ) }}
                {{ csrf_field() }}



                <div class="form-group row">
                    <!-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> -->
                    <div class="col-sm-12">
                        <input name="name" class="form-control" type="text" value="{{old('name')}}" placeholder="{{trans('admin.thirdpartyname')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> -->
                    <div class="col-sm-12">
                        <input name="address" class="form-control" type="text" value="{{old('address')}}" placeholder="{{trans('admin.address')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> -->
                    <div class="col-sm-12">
                        <input name="email" class="form-control" type="email" value="{{old('email')}}" placeholder="{{trans('admin.email')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> -->
                    <div class="col-sm-12">
                        <input name="mobile" class="form-control" type="number" value="{{old('mobile')}}" placeholder="{{trans('admin.mobile')}}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <!-- <label for="example-url-input" class="col-sm-2 col-form-label"></label> -->
                    <div class="col-sm-12">
                        {!! Form::select('type', ['export'=>(trans('admin.export')) ,'import'=>(trans('admin.import')),
                        'all'=>(trans('admin.importandexport'))] , old('type'), ['class'=>'form-control', 'placeholder'=>trans('admin.thirdpartytype'),null]) !!}

                    </div>

                </div>




                {{ Form::submit( trans('admin.Add') ,['class'=>'btn btn-info btn-block']) }}
                {{ Form::close() }}
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection

    @section('script')
    @endsection