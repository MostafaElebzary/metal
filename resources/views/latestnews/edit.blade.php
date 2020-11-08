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
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"> {{trans('admin.LatestNews')}}
                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.editLatestNews')}}
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

                {!! Form::model($service, ['route' => ['latestnews.update',$service->id] , 'method'=>'put' ,'files'=> true ]) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.title_ar')}}</label>

                    <div class="col-sm-9">
                        <input name="title_ar" class="form-control" type="text" value="{{$service->title_ar}}" placeholder="{{trans('admin.title_ar')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.title_en')}}</label>

                    <div class="col-sm-9">
                        <input name="title_en" class="form-control" type="text" value="{{$service->title_en}}" placeholder="{{trans('admin.title_en')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.descr_ar')}}</label>

                    <div class="col-sm-9">
                        <input name="desc_ar" class="form-control" type="text" value="{{$service->desc_ar}}" placeholder="{{trans('admin.descr_ar')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.descr_en')}}</label>

                    <div class="col-sm-9">
                        <input name="desc_en" class="form-control" type="text" value="{{$service->desc_en}}" placeholder="{{trans('admin.descr_en')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.serviceimage')}}</label>

                    <div class="col-sm-9">
                        {{ Form::file('image',array('class'=>'form-control')) }}
                        <img src="{{url('uploads/latestnews/'.$service->image) }}" style="width:200px;height:100px;" />

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