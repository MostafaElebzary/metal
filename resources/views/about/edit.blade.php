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
            <li class="breadcrumb-item"> {{trans('admin.about')}}

            </li>

        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row" style="text-align:center">
    <div class="col-12">

        <div>

            <div class="row" style="text-align:center">
                <div class="col-6">
                    <div>
                        <a href="{{url('points')}}  " class="btn btn-success btn-block">{{trans('admin.mainPoints')}} </a>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <a href="{{url('whyus')}}  " class="btn btn-info btn-block">{{trans('admin.whyus')}} </a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.errors')

        <div class="card m-b-20">
            <div class="card-body" style='text-align:right'>

                {!! Form::model($about, ['route' => ['about.update',$about->id] , 'method'=>'put' ,'files'=> true ]) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.title_ar')}}</label>

                    <div class="col-sm-9">
                        <input name="title_ar" class="form-control" type="text" value="{{$about->title_ar}}" placeholder="{{trans('admin.title_ar')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.title_en')}}</label>

                    <div class="col-sm-9">
                        <input name="title_en" class="form-control" type="text" value="{{$about->title_en}}" placeholder="{{trans('admin.title_en')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.descr_ar')}}</label>

                    <div class="col-sm-9">
                        <input name="desc_ar" class="form-control" type="text" value="{{$about->desc_ar}}" placeholder="{{trans('admin.descr_ar')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.descr_en')}}</label>

                    <div class="col-sm-9">
                        <input name="desc_en" class="form-control" type="text" value="{{$about->desc_en}}" placeholder="{{trans('admin.descr_en')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.aboutfile')}}</label>
                    <div class="col-sm-9">
                        {{ Form::file('image',array('class'=>'form-control')) }}
                    </div>
                </div>



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