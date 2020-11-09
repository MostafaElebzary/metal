@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<!-- Page-Title -->
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
                {{trans('admin.editthirdparty')}}
            </li>

        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row" style="text-align:center">
    <div class="col-12">
        @include('layouts.errors')

        <div class="card m-b-20">
            <div class="card-body" style='text-align:right'>

                {!! Form::model($user_data, ['route' => ['thirdparty.update',$user_data->id] , 'method'=>'put' ]) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2">{{trans('admin.thirdpartyname')}}</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" type="text" value="{{$user_data->name}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2">{{trans('admin.address')}}</label>
                    <div class="col-sm-10">
                        <input name="address" class="form-control" type="text" value="{{$user_data->address}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2">{{trans('admin.email')}}</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" type="email" value="{{$user_data->email}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2">{{trans('admin.mobile')}}</label>
                    <div class="col-sm-10">
                        <input name="mobile" class="form-control" type="number" value="{{$user_data->mobile}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2">{{trans('admin.thirdpartytype')}}</label>
                    <div class="col-sm-10">
                        {!! Form::select('type', ['export'=>(trans('admin.export')) ,'import'=>(trans('admin.import')),
                        'all'=>(trans('admin.importandexport'))] , $user_data->type, ['class'=>'form-control',null]) !!}

                    </div>

                </div>


                {{ Form::submit( trans('admin.edit') ,['class'=>'btn btn-info btn-block']) }}
                {{ Form::close() }}
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection

    @section('script')
    @endsection