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
                {{trans('admin.websiteControll')}}
            </li>
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"> {{trans('admin.categories')}}
                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.addcategory')}}
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

                {{ Form::open( ['url' => ['category'],'method'=>'post'] ) }}
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.Name_ar')}}</label>
                    <div class="col-sm-10">
                        <input name="name_ar" class="form-control" type="text" value="{{old('name_ar')}}" placeholder="{{trans('admin.Name_ar')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.Name_en')}}</label>
                    <div class="col-sm-10">
                        <input name="name_en" class="form-control" type="text" value="{{old('name_en')}}" placeholder="{{trans('admin.Name_en')}}" required>
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