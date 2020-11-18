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
            <li class="breadcrumb-item"><a href="{{url('client')}}">
                {{trans('admin.ClientsList')}}</a>
            </li>

            <li class="breadcrumb-item">
                {{trans('admin.editClient')}}
            </li>

        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row" style="text-align:center">

    <div class="col-12 ">
        @include('layouts.errors')


        <!-- {{ Form::open( ['url' => ['client'],'method'=>'post', 'enctype' => 'multipart/form-data'] ) }} -->
        {!! Form::model($client_data, ['route' => ['client.update',$client_data->id] , 'method'=>'put' ]) !!}
        {{ csrf_field() }}
        <div class="card m-b-20">
            <div class="card-header" style='text-align:right'> <strong> البيانات الاساسيه</strong>
                <div class="card-body" style='text-align:right'>


                    <div class="panel" style='text-align:right'>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.mainclient_name')}}</label>

                            <div class="col-sm-9">
                                <input name="name" class="form-control" type="text" value="{{$client_data->getMainClient->name}}" placeholder="{{trans('admin.mainclient_name')}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.client_name')}}</label>

                            <div class="col-sm-9">
                                <input name="name" class="form-control" type="text" value="{{$client_data->name}}" placeholder="{{trans('admin.client_name')}}" required>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.check_num')}}</label>

                            <div class="col-sm-9">
                                <input name="check_num" class="form-control" type="text" value="{{$client_data->check_num}}" placeholder="{{trans('admin.check_num')}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.check_date')}}</label>

                            <div class="col-sm-9">
                                <input name="check_date" class="form-control" type="date" value="{{$client_data->check_date}}" placeholder="{{trans('admin.check_date')}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.amounts')}}</label>

                            <div class="col-sm-9">
                                <input name="total" id="total" class="form-control" type="number" value="{{$client_data->total}}" placeholder="{{trans('admin.amounts')}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.taxepercent')}}</label>

                            <div class="col-sm-9">
                                <input name="taxepercent" id="taxe" class="form-control" type="number" value="{{$client_data->taxepercent}}" placeholder="{{trans('admin.taxepercent')}}" required>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.totalaftertaxes')}}</label>

                            <div class="col-sm-9">
                                <input name="amount" id="amount" class="form-control" type="number" value="{{$client_data->amount}}" placeholder="{{trans('admin.totalaftertaxes')}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.part_number')}}</label>

                            <div class="col-sm-9">
                                <input name="part_number" class="form-control" type="text" value="{{$client_data->part_number}}" placeholder="{{trans('admin.part_number')}}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.scheme_number')}}</label>

                            <div class="col-sm-9">
                                <input name="scheme_number" class="form-control" type="text" value="{{$client_data->scheme_number}}" placeholder="{{trans('admin.scheme_number')}}" required>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.projecttype')}}</label>

                            <div class="col-sm-9">

                                {{ Form::select('projecttype_id',App\ProjectType::pluck('name','id'),$client_data->projecttype_id
                         ,["class"=>"form-control projecttype_id " ]) }}

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.id_num')}}</label>

                            <div class="col-sm-9">
                                <input name="id_num" class="form-control" type="number" value="{{$client_data->id_num}}" placeholder="{{trans('admin.id_num')}}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.address')}}</label>

                            <div class="col-sm-9">
                                <input name="address" class="form-control" type="text" value="{{$client_data->address}}" placeholder="{{trans('admin.address')}}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3">{{trans('admin.phone')}}</label>

                            <div class="col-sm-9">
                                <input name="phone" class="form-control" type="number" value="{{$client_data->phone}}" placeholder="{{trans('admin.phone')}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-b-20">
            <div class="card-header" style='text-align:right'> <strong> الدفعات </strong>
                <div class="card-body" style='text-align:right'>
                    @php
                    $i = 0;

                    @endphp
                    @foreach($payments as $payment)
                    <div class="form-group row">
                        <div class="col-sm-1">
                            <input name="rows[{{$i}}][number]" class="form-control" readonly type="number" value="{{$payment->number}}">

                        </div>
                        <div class="col-sm-3">
                            <input name="rows[{{$i}}][name]" class="form-control" type="text" value="{{$payment->name}}" readonly>

                        </div>
                        <div class="col-sm-3">
                            <input name="rows[{{$i}}][amount]" id="amount_one" class="form-control" type="number" value="{{$payment->amount}}" placeholder="{{trans('admin.amount')}}">

                        </div>
                        <!-- <div class="col-sm-3">
                            <input name="rows[{{$i}}][payment_date]" id="date_one" class="form-control" type="date" value="{{$payment->payment_date}}" placeholder="{{trans('admin.payment_date')}}">

                        </div> -->
                        <div class="col-sm-2">
                        </div>
                    </div>
                    @php
                    $i++;

                    @endphp
                    @endforeach


                </div>
            </div>
        </div>



        {{ Form::submit( trans('admin.edit') ,['class'=>'btn btn-info btn-block']) }}
        {{ Form::close() }}

        <!-- end col -->
    </div> <!-- end row -->

    @endsection

    @section('script')

    <script>
        $(function() {
            $("#plus_one").on('click', function() {
                document.getElementById('pay_two').style.display = '';

            });


            $("#plus_two").on('click', function() {
                document.getElementById('pay_three').style.display = '';

            });

            $("#plus_three").on('click', function() {
                document.getElementById('pay_four').style.display = '';

            });
            $("#plus_four").on('click', function() {
                document.getElementById('pay_five').style.display = '';

            });

            //delete
            $("#del_two").on('click', function() {
                document.getElementById('amount_two').value = null;
                document.getElementById('date_two').value = null;
                document.getElementById('pay_two').style.display = 'none';


            });

            $("#del_three").on('click', function() {
                document.getElementById('amount_three').value = null;
                document.getElementById('date_three').value = null;
                document.getElementById('pay_three').style.display = 'none';


            });

            $("#del_four").on('click', function() {
                document.getElementById('amount_four').value = null;
                document.getElementById('date_four').value = null;
                document.getElementById('pay_four').style.display = 'none';


            });

            $("#del_five").on('click', function() {
                document.getElementById('amount_five').value = null;
                document.getElementById('date_five').value = null;
                document.getElementById('pay_five').style.display = 'none';


            });

            //files
            $("#fileplus_one").on('click', function() {
                document.getElementById('file_two').style.display = '';

            });

            $("#filedel_two").on('click', function() {
                document.getElementById('filename_two').value = null;
                document.getElementById('file_two').value = null;
                document.getElementById('file_two').style.display = 'none';


            });

            $("#fileplus_two").on('click', function() {
                document.getElementById('file_three').style.display = '';

            });

            $("#filedel_three").on('click', function() {
                document.getElementById('filename_three').value = null;
                document.getElementById('file_three').value = null;
                document.getElementById('file_three').style.display = 'none';


            });

            $("#fileplus_three").on('click', function() {
                document.getElementById('file_four').style.display = '';

            });

            $("#filedel_four").on('click', function() {
                document.getElementById('filename_four').value = null;
                document.getElementById('file_four').value = null;
                document.getElementById('file_four').style.display = 'none';


            });

            $("#fileplus_four").on('click', function() {
                document.getElementById('file_five').style.display = '';

            });

            $("#filedel_five").on('click', function() {
                document.getElementById('filename_five').value = null;
                document.getElementById('file_five').value = null;
                document.getElementById('file_five').style.display = 'none';


            });
        });
    </script>

<script>
         $(function() {
            $("#amount").on('click', function() {
              var taxe =  document.getElementById('taxe').value;
              var total =  document.getElementById('total').value;
              var amount = +total + +(total * taxe/100);
              document.getElementById('amount').value = amount;
              console.log(amount);

            });
         });
    </script>

    @endsection
