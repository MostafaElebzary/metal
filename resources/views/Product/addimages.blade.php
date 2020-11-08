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
                {{trans('admin.websiteControll')}}
            </li>
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"> {{trans('admin.workImages')}}
                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.addworkimages')}}
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

                {{ Form::open( ['url' => ['workimages/'.$id],'method'=>'post','files'=> true] ) }}

                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.productImages')}}</label>

                    <div class="col-sm-9">
                        {{ Form::file('image[]',array('class'=>'form-control','multiple'=>'multiple')) }}
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