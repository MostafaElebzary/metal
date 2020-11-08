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
            <li class="breadcrumb-item"><a href="{{url('about')}}"> {{trans('admin.about')}}</a>

            </li>
            <li class="breadcrumb-item"><a href="{{url('points')}}"> {{trans('admin.points')}}</a>

            </li>
            <li class="breadcrumb-item"> {{trans('admin.editpoint')}}

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

                {!! Form::model($points, ['url' => ['points',$points->id] , 'method'=>'post'     ]) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.point_ar')}}</label>

                    <div class="col-sm-9">
                        <input name="point_ar" class="form-control" type="text" value="{{$points->point_ar}}" placeholder="{{trans('admin.point_ar')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-3">{{trans('admin.point_en')}}</label>

                    <div class="col-sm-9">
                        <input name="point_en" class="form-control" type="text" value="{{$points->point_en}}" placeholder="{{trans('admin.point_en')}}" required>
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