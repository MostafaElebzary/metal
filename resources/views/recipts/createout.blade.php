@extends('layouts.master')

@section('css')
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> -->
<link href="{{url('css/select2.min.css')}}" rel="stylesheet" />

<style>
    #parent {
        /* can be any value */
        width: 300px;
        text-align: right;
        direction: rtl;
        position: relative;
    }

    #parent .select2-container--open+.select2-container--open {
        left: auto;
        right: 0;
        width: 100%;
    }
</style>
@endsection

@section('breadcrumb')
<!-- Page-Title -->
<br>
<div class="app-content content container-fluid">
    <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                {{trans('admin.ClientsList')}}
            </li>


            <li class="breadcrumb-item">
                {{trans('admin.addoutreciept')}}
            </li>

        </ol>
    </div>
</div>
<!-- end page title end breadcrumb -->
@endsection

@section('content')
<div class="row">
    <div class="col-7">
        @include('layouts.errors')

        <div class="card m-b-20">
            <div class="card-body">

                {{ Form::open( ['url' => ['recipts'],'method'=>'post'] ) }}
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.recieptDate')}}</label>
                    <div class="col-sm-10">
                        <input name="type" class="form-control" type="hidden" value="صرف">
                        <input name="date" class="form-control" type="date" value="{{old('date')}}" placeholder="{{trans('admin.date')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.pay_type')}}</label>
                    <div class="col-sm-10">
                        {{ Form::select('pay_type', array('نقد'=>'نقد','شبكه'=>'شبكه'),old('pay_type')
                         ,["class"=>"form-control "]) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.client_name')}}</label>

                    <div class="col-sm-10" id="parent">

                        <select class="itemName form-control" id="client" style="text-align-last: right;" name="client_id">


                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.amount')}}</label>

                    <div class="col-sm-10">
                        <input name="total" id="total" class="form-control" type="number" value="{{old('total')}}" placeholder="{{trans('admin.amount')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.taxepercent')}}</label>

                    <div class="col-sm-10">
                        <input name="taxepercent" id="taxe" class="form-control" type="number" value="{{old('taxepercent')}}" placeholder="{{trans('admin.taxepercent')}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.totalaftertaxes')}}</label>
                    <div class="col-sm-10">
                        <input name="amount" id="amount" class="form-control" type="number" value="{{old('amount')}}" placeholder="{{trans('admin.totalaftertaxes')}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">{{trans('admin.descri')}}</label>
                    <div class="col-sm-10">
                        <textarea name="desc" class="form-control" placeholder="{{trans('admin.descri')}}"></textarea>
                    </div>
                </div>

                {{ Form::submit( trans('admin.Add') ,['class'=>'btn btn-info btn-block']) }}
                {{ Form::close() }}
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="col-5">
        <table id="datatable" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead style="font-family: Cairo;font-size: 18px;">
                <tr style='text-align:center; font-family: Cairo;font-size: 18px;'>

                    <th>{{trans('admin.check_num')}}</th>
                    <th>{{trans('admin.part_number')}}</th>
                    <th>{{trans('admin.scheme_number')}}</th>

                </tr>
            </thead>
            <tbody>
                <tr style='text-align:center'>
                    <td><input name="check_num" id="check_num" class="form-control" type="number" value="{{old('check_num')}}" placeholder="{{trans('admin.check_num')}}" readonly>
                    </td>
                    <td>
                        <input name="part_number" id="part_number" class="form-control" type="text" value="{{old('part_number')}}" placeholder="{{trans('admin.part_number')}}" readonly>
                    </td>
                    <td><input name="scheme_number" id="scheme_number" class="form-control" type="text" value="{{old('scheme_number')}}" placeholder="{{trans('admin.scheme_number')}}" readonly>
                    </td>
                </tr>
            </tbody>
    </div>
</div>

@endsection

@section('script')

<script>
    $(function() {
        $("#amount").on('click', function() {
            var taxe = document.getElementById('taxe').value;
            var total = document.getElementById('total').value;
            var amount = +total + +(total * taxe / 100);
            document.getElementById('amount').value = amount;

        });
        $("#client").on('change', function() {
            var id = document.getElementById("client").value;

            $.ajax({
                url: "/clientdata/" + id,
                dataType: "json",
                success: function(html) {
                    $('#check_num').val(html.data_client.check_num);
                    $('#part_number').val(html.data_client.part_number);
                    $('#scheme_number').val(html.data_client.scheme_number);

                }
            })
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $('.itemName').select2({
            placeholder: '  ابحث باسم العميل او رقم الهويه او رقم الجوال',
            dir: 'rtl',
            dropdownParent: $('#parent'),
            ajax: {
                url: '/select2-autocomplete-ajax',
                dataType: 'json',
                delay: 1500,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });
</script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

@endsection