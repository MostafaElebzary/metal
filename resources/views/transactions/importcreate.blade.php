@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<!-- Page-Title -->
<br>
<div class="app-content content container-fluid">
    <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
            
            <li class="breadcrumb-item"><a href="{{ url('transactions')}}"> {{trans('admin.transactions')}}

                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.createimporttransaction')}}
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

                {{ Form::open( ['url' => ['transactions'],'method'=>'post','files'=>true] ) }}
                {{ csrf_field() }}

                <input name="type" class="form-control" type="hidden" value="import" required>


                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.transactionstatus')}}</label>
                    <div class="col-sm-10">
                    {!! Form::select('status', ['secret'=>(trans('admin.secret')) ,
                            'urgent'=>(trans('admin.urgent')),'all'=>(trans('admin.urgentandsecret'))] 
                            , old('status'), ['class'=>'form-control','placeholder'=>trans('admin.notransactionstatus'),null]) !!}
                   </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.description')}}</label>
                    <div class="col-sm-10">
                        <input name="desc" class="form-control" type="text" value="{{old('desc')}}" placeholder="" required>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.importnumber')}}</label>
                    <div class="col-sm-10">
                        <input name="number" class="form-control" type="number" value="{{old('number')}}" placeholder="" required>
                    </div>
                </div> -->


                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2 col-form-label">{{trans('admin.import_trans_type')}}</label>
                    <div class="col-sm-10">
                        {{ Form::select('trans_type_id',App\TransactionsType::where('type','import')->orWhere('type','all')->pluck('name','id'),old('trans_type_id')
                             ,["class"=>"form-control trans_type_id"  ]) }}

                    </div>

                </div>


                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2 col-form-label">{{trans('admin.import_thirdparty')}}</label>
                    <div class="col-sm-10">
                        {{ Form::select('thirdparty_id',App\ThirdParty::where('type','import')->orWhere('type','all')->pluck('name','id'),old('thirdparty_id')
                         ,["class"=>"form-control thirdparty_id"  ]) }}

                    </div>

                </div>

                
                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.import_trans_date')}}</label>
                    <div class="col-sm-10">
                        <input name="trans_date" class="form-control" type="date" value="{{old('trans_date')}}" placeholder="" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.export_note')}}</label>
                    <div class="col-sm-10">
                        <input name="note" class="form-control"  type="text" value="{{old('note')}}" placeholder="" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">{{trans('admin.attachment')}}</label>
                    <div class="col-sm-10">
 
                    {{ Form::file('file[]',array('class'=>'form-control','multiple'=>'multiple')) }}
                    </div>
                </div>
                            <div class="row">
                {{ Form::submit( trans('admin.Add') ,['class' => 'btn btn-info col-sm-6', 'name' => 'submitbutton', 'value' => 'save']) }}
                {!! Form::submit( trans('admin.barcode'), ['class' => 'btn btn-success col-sm-6', 'name' => 'submitbutton', 'value' => 'barcode'])!!}
                            </div>
                {{ Form::close() }}
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection

    @section('script')
    @endsection