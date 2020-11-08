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
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"> {{trans('admin.featuredworks')}}
                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.edit')}}
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

            {!! Form::model($product, ['route' => ['works.update',$product->id] , 'method'=>'put' ]) !!}

                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.category')}}</label>

                    <div class="col-sm-9">
                        <!-- cat_id -->
                        @if(session('lang')=='en')
                        {{ Form::select('cat_id',App\Category::pluck('name_en','id'),$product->cat_id
            ,["class"=>"form-control dept_id " , 'placeholder'=>'trans("admin.choosecategory")']) }}
            @else
            {{ Form::select('cat_id',App\Category::pluck('name_ar','id'),$product->cat_id
            ,["class"=>"form-control dept_id " ]) }}
            @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.title_ar')}}</label>

                    <div class="col-sm-9">
                        <input name="title_ar" class="form-control" type="text" value="{{$product->title_ar}}" placeholder="{{trans('admin.title_ar')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.title_en')}}</label>

                    <div class="col-sm-9">
                        <input name="title_en" class="form-control" type="text" value="{{$product->title_en}}" placeholder="{{trans('admin.title_en')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.descr_ar')}}</label>

                    <div class="col-sm-9">
                        <input name="desc_ar" class="form-control" type="text" value="{{$product->desc_ar}}" placeholder="{{trans('admin.descr_ar')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.descr_en')}}</label>

                    <div class="col-sm-9">
                        <input name="desc_en" class="form-control" type="text" value="{{$product->desc_en}}" placeholder="{{trans('admin.descr_en')}}" required>
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