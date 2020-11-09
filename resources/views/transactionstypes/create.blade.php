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
                {{trans('admin.transactions')}}
            </li>
            <li class="breadcrumb-item"><a href="{{ url('transactionstypes')}}"> {{trans('admin.transactionstype')}}

                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.createtransactionstypes')}}
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

                {{ Form::open( ['url' => ['transactionstypes'],'method'=>'post'] ) }}
                {{ csrf_field() }}

                <!--<div class="form-group row">-->
                    <!-- <label for="example-text-input" class="col-sm-2 col-form-label"></label> -->
                <!--    <div class="col-sm-12">-->
                <!--        <input name="code" class="form-control" type="number" value="{{old('code')}}" placeholder="{{trans('admin.code')}}" required>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="form-group row">
                    <!-- <label for="example-search-input" class="col-sm-2 col-form-label"></label> -->
                    <div class="col-sm-12">
                        <input name="name" class="form-control" type="text" value="{{old('name')}}" placeholder="{{trans('admin.transactionname')}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <!-- <label for="example-email-input" class="col-sm-2 col-form-label"></label> -->
                    <div class="col-sm-12">
                    {!! Form::select('status', ['active'=>(trans('admin.active')) ,'deactive'=>(trans('admin.deactive'))] , old('status'), ['class'=>'form-control',null]) !!}
   
                    </div>
                </div>




                <div class="form-group row">
                    <!-- <label for="example-url-input" class="col-sm-2 col-form-label"></label> -->
                    <div class="col-sm-12">
                        {!! Form::select('type', ['export'=>(trans('admin.export')) ,'import'=>(trans('admin.import')),
                            'all'=>(trans('admin.importandexport'))] , old('type'), ['class'=>'form-control',null]) !!}

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