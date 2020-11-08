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
            <li class="breadcrumb-item"><a href="{{ url('projecttypes') }}"> {{trans('admin.projectTypeSettings')}}
                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.editprojecttype')}}
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

                {!! Form::model($project_type, ['route' => ['projecttypes.update',$project_type->id] , 'method'=>'put' ]) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.Name')}}</label>

                    <div class="col-sm-10">
                        <input name="name" class="form-control" type="text" value="{{$project_type->name}}" placeholder="{{trans('admin.Name')}}" required>
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