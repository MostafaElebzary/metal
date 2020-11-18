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
                    {{trans('admin.ClientsList')}}
                </li>

                <li class="breadcrumb-item">
                    {{trans('admin.addClient')}}
                </li>

            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row" style="text-align:center">

        <div class="col-12 ">
            @include('layouts.errors')


            {{ Form::open( ['url' => ['client'],'method'=>'post', 'enctype' => 'multipart/form-data'] ) }}

            {{ csrf_field() }}
            <div class="card m-b-20">
                <div class="card-header" style='text-align:right'><strong> البيانات الاساسيه</strong>
                    <div class="card-body" style='text-align:right'>


                        <div class="panel" style='text-align:right'>
                            <div class="form-group row">
                                <label for="example-text-input"
                                       class="col-sm-3">{{trans('admin.mainclient_name')}}</label>

                                <div class="col-sm-9">

                                    {{ Form::select('mainclient_id',App\MainClient::pluck('name','id'),old('mainclient_id')
                             ,["class"=>"form-control mainclient_id " ]) }}

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.client_name')}}</label>

                                <div class="col-sm-9">
                                    <input name="name" class="form-control" type="text" value="{{old('name')}}"
                                           placeholder="{{trans('admin.client_name')}}" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.check_num')}}</label>

                                <div class="col-sm-9">
                                    <input name="check_num" class="form-control" type="text"
                                           value="{{old('check_num')}}" placeholder="{{trans('admin.check_num')}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.check_date')}}</label>

                                <div class="col-sm-9">
                                    <input name="check_date" id="hijri-picker" value="{{old('check_date')}}" type="text"
                                           placeholder="{{trans('admin.check_date')}}" class="form-control" required/>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.amounts')}}</label>

                                <div class="col-sm-9">
                                    <input name="total" id="total" class="form-control" type="number"
                                           value="{{old('total')}}" placeholder="{{trans('admin.amounts')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.taxepercent')}}</label>

                                <div class="col-sm-9">
                                    <input name="taxepercent" id="taxe" class="form-control" type="number"
                                           value="{{old('taxepercent')}}" placeholder="{{trans('admin.taxepercent')}}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input"
                                       class="col-sm-3">{{trans('admin.totalaftertaxes')}}</label>

                                <div class="col-sm-9">
                                    <input name="amount" id="amount" class="form-control" type="number"
                                           value="{{old('amount')}}" placeholder="{{trans('admin.totalaftertaxes')}}"
                                           readonly>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.part_number')}}</label>

                                <div class="col-sm-9">
                                    <input name="part_number" class="form-control" type="text"
                                           value="{{old('part_number')}}" placeholder="{{trans('admin.part_number')}}"
                                           required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input"
                                       class="col-sm-3">{{trans('admin.scheme_number')}}</label>

                                <div class="col-sm-9">
                                    <input name="scheme_number" class="form-control" type="text"
                                           value="{{old('scheme_number')}}"
                                           placeholder="{{trans('admin.scheme_number')}}" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.projecttype')}}</label>

                                <div class="col-sm-9">

                                    {{ Form::select('projecttype_id',App\ProjectType::pluck('name','id'),old('projecttype_id')
                             ,["class"=>"form-control projecttype_id " ]) }}

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.id_num')}}</label>

                                <div class="col-sm-9">
                                    <input name="id_num" class="form-control" type="number" value="{{old('id_num')}}"
                                           placeholder="{{trans('admin.id_num')}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.address')}}</label>

                                <div class="col-sm-9">
                                    <input name="address" class="form-control" type="text" value="{{old('address')}}"
                                           placeholder="{{trans('admin.address')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3">{{trans('admin.phone')}}</label>

                                <div class="col-sm-9">
                                    <input name="phone" class="form-control" type="number" value="{{old('phone')}}"
                                           placeholder="{{trans('admin.phone')}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-b-20">
                <div class="card-header" style='text-align:right'><strong> الدفعات </strong>
                    <div class="card-body" style='text-align:right'>
                        <div id="pay_one" class="form-group row">
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->
                            <div class="col-sm-1">
                                <input name="rows[0][number]" class="form-control" readonly type="number" value="1">

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[0][name]" class="form-control" type="text" value="الدفعة الاولى"
                                       readonly>

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[0][amount]" id="amount_one" class="form-control" type="number"
                                       value="" placeholder="{{trans('admin.amount')}}">

                            </div>
                        <!-- <div class="col-sm-3">
                            <input name="rows[0][payment_date]" id="date_one" class="form-control" type="date" value="" placeholder="{{trans('admin.payment_date')}}">

                        </div> -->
                            <div class="col-sm-2">
                                <button type="button" id="plus_one" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-plus"></i></button>
                                <!-- <button type="button" id="del_one" class="btn btn-danger waves-effect" ><i class="fa fa-trash"></i></button> -->
                            </div>
                        </div>


                        <div id="pay_two" class="form-group row" style='display: none;'>
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->

                            <div class="col-sm-1">
                                <input name="rows[1][number]" class="form-control" readonly type="number" value="2">

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[1][name]" class="form-control" type="text" value="الدفعة الثانيه"
                                       readonly>

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[1][amount]" id="amount_two" class="form-control" type="number"
                                       value="" placeholder="{{trans('admin.amount')}}">

                            </div>
                        <!-- <div class="col-sm-3">
                            <input name="rows[1][payment_date]" id="date_two" class="form-control" type="date" value="" placeholder="{{trans('admin.payment_date')}}">

                        </div> -->


                            <div class="col-sm-2">
                                <button type="button" id="plus_two" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-plus"></i></button>
                                <button type="button" id="del_two" class="btn btn-danger waves-effect"><i
                                        class="fa fa-trash"></i></button>

                            </div>
                        </div>

                        <div id="pay_three" class="form-group row" style='display: none;'>
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->

                            <div class="col-sm-1">
                                <input name="rows[2][number]" class="form-control" readonly type="number" value="3">

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[2][name]" class="form-control" type="text" value="الدفعة الثالثه"
                                       readonly>

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[2][amount]" id="amount_three" class="form-control" type="number"
                                       value="" placeholder="{{trans('admin.amount')}}">

                            </div>
                        <!-- <div class="col-sm-3">
                            <input name="rows[2][payment_date]" id="date_three" class="form-control" type="date" value="" placeholder="{{trans('admin.payment_date')}}">

                        </div> -->


                            <div class="col-sm-2">
                                <button type="button" id="plus_three" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-plus"></i></button>
                                <button type="button" id="del_three" class="btn btn-danger waves-effect"><i
                                        class="fa fa-trash"></i></button>

                            </div>
                        </div>

                        <div id="pay_four" class="form-group row" style='display: none;'>
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->

                            <div class="col-sm-1">
                                <input name="rows[3][number]" class="form-control" readonly type="number" value="4">

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[3][name]" class="form-control" type="text" value="الدفعة الرابعه"
                                       readonly>

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[3][amount]" id="amount_four" class="form-control" type="number"
                                       value="" placeholder="{{trans('admin.amount')}}">

                            </div>
                        <!-- <div class="col-sm-3">
                            <input name="rows[3][payment_date]" id="date_four" class="form-control" type="date" value="" placeholder="{{trans('admin.payment_date')}}">

                        </div> -->


                            <div class="col-sm-2">
                                <button type="button" id="plus_four" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-plus"></i></button>
                                <button type="button" id="del_four" class="btn btn-danger waves-effect"><i
                                        class="fa fa-trash"></i></button>

                            </div>
                        </div>

                        <div id="pay_five" class="form-group row" style='display: none;'>
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->

                            <div class="col-sm-1">
                                <input name="rows[4][number]" class="form-control" readonly type="number" value="5">

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[4][name]" class="form-control" type="text" value="الدفعة الخامسة"
                                       readonly>

                            </div>
                            <div class="col-sm-3">
                                <input name="rows[4][amount]" id="amount_five" class="form-control" type="number"
                                       value="" placeholder="{{trans('admin.amount')}}">

                            </div>
                        <!-- <div class="col-sm-3">
                            <input name="rows[4][payment_date]" id="date_five" class="form-control" type="date" value="" placeholder="{{trans('admin.payment_date')}}">

                        </div> -->


                            <div class="col-sm-2">
                                <!-- <button type="button" id="plus_five" class="btn btn-secondary waves-effect"><i class="fa fa-plus"></i></button> -->
                                <button type="button" id="del_five" class="btn btn-danger waves-effect"><i
                                        class="fa fa-trash"></i></button>

                            </div>
                        </div>

                        <div class="panel" style='text-align:right'>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card m-b-20">
                <div class="card-header" style='text-align:right'><strong> المرفقات </strong>
                    <div class="card-body" style='text-align:right'>
                        <div id="file_one" class="form-group row">
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->
                            <div class="col-sm-2">
                                <input name="atts[0][file_number]" class="form-control" readonly type="number"
                                       value="1">

                            </div>
                            <div class="col-sm-4">
                                <input name="atts[0][file_name]" class="form-control" type="text"
                                       placeholder="{{trans('admin.file')}}">

                            </div>
                            <div class="col-sm-4">
                                <input name="file[0]" id="amount_one" class="form-control" type="file">

                            </div>

                            <div class="col-sm-2">
                                <button type="button" id="fileplus_one" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-plus"></i></button>
                                <!-- <button type="button" id="del_one" class="btn btn-danger waves-effect" ><i class="fa fa-trash"></i></button> -->
                            </div>
                        </div>
                        <div id="file_two" style='display: none;' class="form-group row">
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->
                            <div class="col-sm-2">
                                <input name="atts[1][file_number]" class="form-control" readonly type="number"
                                       value="2">

                            </div>
                            <div class="col-sm-4">
                                <input name="atts[1][file_name]" id="filename_two" class="form-control" type="text"
                                       placeholder="{{trans('admin.file')}}">

                            </div>
                            <div class="col-sm-4">
                                <input name="file[1]" id="file_two" class="form-control" type="file">

                            </div>

                            <div class="col-sm-2">
                                <button type="button" id="fileplus_two" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-plus"></i></button>
                                <button type="button" id="filedel_two" class="btn btn-danger waves-effect"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>

                        <div id="file_three" style='display: none;' class="form-group row">
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->
                            <div class="col-sm-2">
                                <input name="atts[2][file_number]" class="form-control" readonly type="number"
                                       value="3">

                            </div>
                            <div class="col-sm-4">
                                <input name="atts[2][file_name]" id="filename_three" class="form-control" type="text"
                                       placeholder="{{trans('admin.file')}}">

                            </div>
                            <div class="col-sm-4">
                                <input name="file[2]" id="file_three" class="form-control" type="file">

                            </div>

                            <div class="col-sm-2">
                                <button type="button" id="fileplus_three" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-plus"></i></button>
                                <button type="button" id="filedel_three" class="btn btn-danger waves-effect"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>

                        <div id="file_four" style='display: none;' class="form-group row">
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->
                            <div class="col-sm-2">
                                <input name="atts[3][file_number]" class="form-control" readonly type="number"
                                       value="4">

                            </div>
                            <div class="col-sm-4">
                                <input name="atts[3][file_name]" id="filename_four" class="form-control" type="text"
                                       placeholder="{{trans('admin.file')}}">

                            </div>
                            <div class="col-sm-4">
                                <input name="file[3]" id="file_four" class="form-control" type="file">

                            </div>

                            <div class="col-sm-2">
                                <button type="button" id="fileplus_four" class="btn btn-secondary waves-effect"><i
                                        class="fa fa-plus"></i></button>
                                <button type="button" id="filedel_four" class="btn btn-danger waves-effect"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>

                        <div id="file_five" style='display: none;' class="form-group row">
                        <!-- <label for="example-url-input" class="col-sm-1 col-form-label">{{trans('admin.installments')}}</label> -->
                            <div class="col-sm-2">
                                <input name="atts[4][file_number]" class="form-control" readonly type="number"
                                       value="5">

                            </div>
                            <div class="col-sm-4">
                                <input name="atts[4][file_name]" id="filename_five" class="form-control" type="text"
                                       placeholder="{{trans('admin.file')}}">

                            </div>
                            <div class="col-sm-4">
                                <input name="file[4]" id="file_five" class="form-control" type="file">

                            </div>

                            <div class="col-sm-2">
                                <!-- <button type="button" id="fileplus_five" class="btn btn-secondary waves-effect"><i class="fa fa-plus"></i></button> -->
                                <button type="button" id="filedel_five" class="btn btn-danger waves-effect"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        {{ Form::submit( trans('admin.Add') ,['class'=>'btn btn-info btn-block']) }}
        {{ Form::close() }}

        <!-- end col -->
        </div> <!-- end row -->

        @endsection

        @section('script')


            <script type="text/javascript">


                $(function () {

                    initDefault();

                });

                function initDefault() {
                    $("#hijri-picker").hijriDatePicker({
                        hijri: true,
                        showSwitcher: false
                    });
                }

            </script>
            <script>
                $(function () {
                    $("#plus_one").on('click', function () {
                        document.getElementById('pay_two').style.display = '';

                    });


                    $("#plus_two").on('click', function () {
                        document.getElementById('pay_three').style.display = '';

                    });

                    $("#plus_three").on('click', function () {
                        document.getElementById('pay_four').style.display = '';

                    });
                    $("#plus_four").on('click', function () {
                        document.getElementById('pay_five').style.display = '';

                    });

                    //delete
                    $("#del_two").on('click', function () {
                        document.getElementById('amount_two').value = null;
                        // document.getElementById('date_two').value = null;
                        document.getElementById('pay_two').style.display = 'none';


                    });

                    $("#del_three").on('click', function () {
                        document.getElementById('amount_three').value = null;
                        // document.getElementById('date_three').value = null;
                        document.getElementById('pay_three').style.display = 'none';


                    });

                    $("#del_four").on('click', function () {
                        document.getElementById('amount_four').value = null;
                        // document.getElementById('date_four').value = null;
                        document.getElementById('pay_four').style.display = 'none';


                    });

                    $("#del_five").on('click', function () {
                        document.getElementById('amount_five').value = null;
                        // document.getElementById('date_five').value = null;
                        document.getElementById('pay_five').style.display = 'none';


                    });

                    //files
                    $("#fileplus_one").on('click', function () {
                        document.getElementById('file_two').style.display = '';

                    });

                    $("#filedel_two").on('click', function () {
                        document.getElementById('filename_two').value = null;
                        document.getElementById('file_two').value = null;
                        document.getElementById('file_two').style.display = 'none';


                    });

                    $("#fileplus_two").on('click', function () {
                        document.getElementById('file_three').style.display = '';

                    });

                    $("#filedel_three").on('click', function () {
                        document.getElementById('filename_three').value = null;
                        document.getElementById('file_three').value = null;
                        document.getElementById('file_three').style.display = 'none';


                    });

                    $("#fileplus_three").on('click', function () {
                        document.getElementById('file_four').style.display = '';

                    });

                    $("#filedel_four").on('click', function () {
                        document.getElementById('filename_four').value = null;
                        document.getElementById('file_four').value = null;
                        document.getElementById('file_four').style.display = 'none';


                    });

                    $("#fileplus_four").on('click', function () {
                        document.getElementById('file_five').style.display = '';

                    });

                    $("#filedel_five").on('click', function () {
                        document.getElementById('filename_five').value = null;
                        document.getElementById('file_five').value = null;
                        document.getElementById('file_five').style.display = 'none';


                    });
                });
            </script>
            <script>
                $(function () {
                    $("#amount").on('click', function () {
                        var taxe = document.getElementById('taxe').value;
                        var total = document.getElementById('total').value;
                        var amount = +total + +(total * taxe / 100);
                        document.getElementById('amount').value = amount;
                        console.log(amount);

                    });
                });
            </script>

@endsection
