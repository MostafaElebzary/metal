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
                     لوحة التحكم 
                </li>
                <li class="breadcrumb-item"><a href="{{ url()->previous() }}"> الموظفين والصلاحيات  
                    </a>
                    </li>

                    <li class="breadcrumb-item">
                     اضافة موظف جديد
                </li>

            </ol>
        </div>
    </div>
<!-- end page title end breadcrumb -->
@endsection

@section('content')
             <div class="row" >
                    <div class="col-12">
                    @include('layouts.errors')

                        <div class="card m-b-20">
                            <div class="card-body" >
 
                            {{ Form::open( ['url' => ['users'],'method'=>'post'] ) }}
                                 {{ csrf_field() }}

                                <div class="form-group row">
                                    <!-- <label for="example-text-input" class="col-sm-2 col-form-label"></label> -->
                                    <div class="col-sm-12">
                                        <input name="name" class="form-control" type="text" value="{{old('name')}}" placeholder="{{trans('admin.Name')}}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- <label for="example-text-input" class="col-sm-2 col-form-label"></label> -->
                                    <div class="col-sm-12">

                                    {{ Form::select('branch_id',App\Branch::pluck('name','id'),old('branch_id')
                         ,["class"=>"form-control branch_id " ]) }}
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <!-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> -->
                                    <div class="col-sm-12">
                                        <input name="job" class="form-control" type="job" value="{{old('job')}}" placeholder="{{trans('admin.job')}}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> -->
                                    <div class="col-sm-12">
                                        <input name="email" class="form-control" type="email" value="{{old('email')}}" placeholder="{{trans('admin.email')}}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- <label for="example-email-input" class="col-sm-2 col-form-label"></label> -->
                                    <div class="col-sm-12">
                                        <input name="mobile" class="form-control" type="number" value="{{old('mobile')}}"  placeholder="{{trans('admin.mobile')}}" required>
                                    </div>
                                </div>

                               


                                <div class="form-group row">
                                    <!-- <label for="example-url-input" class="col-sm-2 col-form-label"></label> -->
                                    <div class="col-sm-12">
                                    {!! Form::select('type', ['admin'=>(trans('admin.admin')) ,'user'=>(trans('admin.user'))] , old('type'), ['class'=>'form-control',null]) !!}
      
                                   </div>

                                </div>
 

                                <div class="form-group row">
                                    <!-- <label for="example-url-input" class="col-sm-2 col-form-label"></label> -->
                                    <div class="col-sm-12">
                                        <input name="password" class="form-control" type="password"  placeholder="{{trans('admin.password')}}" required>
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

