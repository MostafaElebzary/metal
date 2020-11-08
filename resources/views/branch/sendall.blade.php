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
                {{trans('admin.sendall')}}
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

                {{ Form::open( ['url' => ['sendall'],'method'=>'post'] ) }}
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.message')}}</label>
                    <div class="col-sm-10">
                        <textarea name="message" class="form-control" type="text" value="{{old('message')}}" placeholder="{{trans('admin.message')}}" required></textarea>
                    </div>
                </div>
               

                {{ Form::submit( trans('admin.send') ,['class'=>'btn btn-info btn-block']) }}
                {{ Form::close() }}
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection

    @section('script')
    @endsection