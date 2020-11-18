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
                {{trans('admin.cpanel')}}
            </li>
            <li class="breadcrumb-item"><a href="{{ url('mainclient') }}"> {{trans('admin.mainclients')}}
                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.editmainclient')}}
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

                {!! Form::model($category, ['route' => ['mainclient.update',$category->id] , 'method'=>'put' ]) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.mainclient_name')}}</label>

                    <div class="col-sm-9">
                        <input name="name" class="form-control" type="text" value="{{$category->name }}"
                               placeholder="{{trans('admin.mainclient_name')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.id_num')}}</label>

                    <div class="col-sm-9">
                        <input name="id_num" class="form-control" type="number" value="{{$category->id_num}}"
                               placeholder="{{trans('admin.id_num')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.address')}}</label>

                    <div class="col-sm-9">
                        <input name="address" class="form-control" type="text" value="{{$category->address}}"
                               placeholder="{{trans('admin.address')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.phone')}}</label>

                    <div class="col-sm-9">
                        <input name="phone" class="form-control" type="number" value="{{$category->phone}}"
                               placeholder="{{trans('admin.phone')}}" required>
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
