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
                {{trans('admin.transactions')}}
            </li>
            <li class="breadcrumb-item"><a href="{{ url('transactionstypes')}}"> {{trans('admin.transactionstype')}}

                </a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.edittransactionstypes')}}
            </li>

        </ol>
    </div>
</div>
    </div>
</div>
@endsection

@section('content')
<div class="row" style="text-align:center">
    <div class="col-12">
        @include('layouts.errors')

        <div class="card m-b-20">
            <div class="card-body" style='text-align:right'>

                {!! Form::model($user_data, ['route' => ['transactionstypes.update',$user_data->id] , 'method'=>'put' ]) !!}
                {{ csrf_field() }}
  
                         <input name="code" class="form-control" type="hidden" value="{{$user_data->code}}"  required>
  


                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2">{{trans('admin.transactionname')}}</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" type="text" value="{{$user_data->name}}"  required>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2">{{trans('admin.status')}}</label>
                    <div class="col-sm-10">
                        {!! Form::select('status',  ['active'=>(trans('admin.active')) ,'deactive'=>(trans('admin.deactive'))]
                            , $user_data->status, ['class'=>'form-control',null]) !!}

                    </div>

                </div>
                


                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2">{{trans('admin.transactiontype')}}</label>
                    <div class="col-sm-10">
                        {!! Form::select('type', ['export'=>(trans('admin.export')) ,'import'=>(trans('admin.import')),
                            'all'=>(trans('admin.importandexport'))] , $user_data->type, ['class'=>'form-control',null]) !!}

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