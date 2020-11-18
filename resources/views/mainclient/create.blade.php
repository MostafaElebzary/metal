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
                    {{trans('admin.cpanel')}}
                </li>
                <li class="breadcrumb-item"><a href="{{ url('mainclient') }}"> {{trans('admin.mainclients')}}
                    </a>
                </li>

                <li class="breadcrumb-item">
                    {{trans('admin.addmainclient')}}
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

                    {{ Form::open( ['url' => ['mainclient'],'method'=>'post'] ) }}
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3">{{trans('admin.mainclient_name')}}</label>

                        <div class="col-sm-9">
                            <input name="name" class="form-control" type="text" value="{{old('name')}}"
                                   placeholder="{{trans('admin.mainclient_name')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3">{{trans('admin.id_num')}}</label>

                        <div class="col-sm-9">
                            <input name="id_num" class="form-control" type="number" value="{{old('id_num')}}"
                                   placeholder="{{trans('admin.id_num')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3">{{trans('admin.address')}}</label>

                        <div class="col-sm-9">
                            <input name="address" class="form-control" type="text" value="{{old('address')}}"
                                   placeholder="{{trans('admin.address')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3">{{trans('admin.phone')}}</label>

                        <div class="col-sm-9">
                            <input name="phone" class="form-control" type="number" value="{{old('phone')}}"
                                   placeholder="{{trans('admin.phone')}}" required>
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
