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
                لوحة التحكم
            </li>
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"> الموظفين والصلاحيات
                </a>
            </li>

            <li class="breadcrumb-item">
                تعديل بيانات موظف
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

                {!! Form::model($user_data, ['route' => ['users.update',$user_data->id] , 'method'=>'put' ]) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.Name')}}</label>

                    <div class="col-sm-10">
                        <input name="name" class="form-control" type="text" value="{{$user_data->name}}" placeholder="{{trans('admin.Name')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.branchs')}}</label>

                    <div class="col-sm-10">

                    {{ Form::select('branch_id',App\Branch::pluck('name','id'),$user_data->branch_id
                         ,["class"=>"form-control branch_id " ]) }}                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2">{{trans('admin.job')}}</label>
                    <div class="col-sm-10">
                        <input name="job" class="form-control" type="job" value="{{$user_data->job}}" placeholder="{{trans('admin.job')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2">{{trans('admin.email')}}</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" type="email" value="{{$user_data->email}}" placeholder="{{trans('admin.email')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-2">{{trans('admin.mobile')}}</label>
                    <div class="col-sm-10">
                        <input name="mobile" class="form-control" type="number" value="{{$user_data->mobile}}" placeholder="{{trans('admin.mobile')}}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2">{{trans('admin.type')}}</label>
                    <div class="col-sm-10">
                        {!! Form::select('type', ['admin'=>(trans('admin.admin')) ,'user'=>(trans('admin.user'))] , $user_data->type, ['class'=>'form-control',null]) !!}

                    </div>

                </div>





                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2">{{trans('admin.new_password')}}</label>
                    <div class="col-sm-10">
                        <input name="password" class="form-control" type="password" placeholder="{{trans('admin.new_password')}}  ">
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