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

            <li class="breadcrumb-item"><a href="{{ url('transactions')}}"> {{trans('admin.transactions')}}</a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.editexporttransaction')}}
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

                {!! Form::model($user_data, ['route' => ['transactions.update',$user_data->id] , 'method'=>'put' ]) !!}
                {{ csrf_field() }}

                <input name="type" class="form-control" type="hidden" value="export" required>


                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.transactionstatus')}}</label>
                    <div class="col-sm-10"> 
                  
                   {!! Form::select('status', ['secret'=>(trans('admin.secret')) ,
                        'urgent'=>(trans('admin.urgent')),'all'=>(trans('admin.urgentandsecret'))]
                        , $user_data->status, ['class'=>'form-control','placeholder'=>trans('admin.notransactionstatus'),null]) !!}
                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.description')}}</label>
                    <div class="col-sm-10">
                        <input name="desc" class="form-control" type="text" value="{{$user_data->desc}}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.exportnumber')}}</label>
                    <div class="col-sm-10">
                    <label for="example-search-input" class="form-control">{{$user_data->number}}</label>

                    <input name="number" class="form-control" type="hidden" value="{{$user_data->number}}" placeholder="" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2 col-form-label">{{trans('admin.export_trans_type')}}</label>
                    <div class="col-sm-10">
                        {{ Form::select('trans_type_id',App\TransactionsType::where('type','export')->orWhere('type','all')->pluck('name','id')
            ,$user_data->trans_type_id ,["class"=>"form-control trans_type_id"  ]) }}

                    </div>

                </div>


                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2 col-form-label">{{trans('admin.export_thirdparty')}}</label>
                    <div class="col-sm-10">
                        {{ Form::select('thirdparty_id',App\ThirdParty::where('type','export')->orWhere('type','all')->pluck('name','id')
            ,$user_data->thirdparty_id
         ,["class"=>"form-control thirdparty_id"  ]) }}

                    </div>

                </div>


                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.export_trans_date')}}</label>
                    <div class="col-sm-10">
                        <input name="trans_date" class="form-control" type="date" value="{{$user_data->trans_date}}" placeholder="" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.export_note')}}</label>
                    <div class="col-sm-10">
                        <input name="note" class="form-control" type="text" value="{{$user_data->note}}" placeholder="">
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