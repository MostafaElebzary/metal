@extends('layouts.master')

@section('css')
@if(session('lang')=='en')
<!-- DataTables -->

<link href="{{url('css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@else
<!-- DataTables -->

<link href="{{url('css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('rtl/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('rtl/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('rtl/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endif

@endsection

@section('breadcrumb')
<!-- Page-Title -->
<br>
<div class="app-content content container-fluid">
    <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                {{trans('admin.cpanel')}}
            </li>
            <li class="breadcrumb-item"> {{trans('admin.ClientAccountStatement')}}
            </li>

        </ol>
    </div>
</div>
<!-- end page title end breadcrumb -->
@endsection

@section('content')


@include('layouts.errors')


<div class="row">

    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">

                {{ Form::open( ['url' => ['account'],'method'=>'post'] ) }}
                {{ csrf_field() }}



                <div class="row">
                    <div class="form-group col-sm-6 row">
                        <label for="example-text-input" class="col-sm-2">{{trans('admin.client_name')}}</label>
                        <div class="col-sm-10" id="parent">
                            <select id="client" class="itemName form-control" style="text-align-last: right;" name="client_id">
                            </select>
                        </div>


                    </div>
                </div>
                <div class="row">
                    {{ Form::submit( trans('admin.search') ,['class'=>'col-6 btn btn-info ']) }}
                    @if($contract !=null)
                    <a class="btn btn-primary col-6 " target="_blank" href="{{url('AccountPrint/'.$contract->id)}}">طباعه </a>
                    @endif
                </div>


                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>


<div class="row">


    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-header" style="text-align: center;">
                بيانات التعاقد للعميل
                @if($contract !=null)
                {{$contract->name}}
                @endif
            </div>
            <div class="card-body">

                <table id="datatable2" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead style="font-family: Cairo;font-size: 18px;">
                        <tr style='text-align:center; font-family: Cairo;font-size: 18px;'>
                            <th>#</th>
                            <th>{{trans('admin.contractdate')}}</th>
                            <th>{{trans('admin.contracttotal')}}</th>
                            <th>{{trans('admin.check_num')}}</th>
                            <th>{{trans('admin.phone')}}</th>
                            <th>{{trans('admin.id_num')}}</th>
                            <th>{{trans('admin.part_number')}}</th>
                        </tr>
                    </thead>


                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @if($contract != null)

                        <tr style='text-align:center'>
                            <td>{{$i}}</td>
                            <td>{{$contract->check_date}}</td>
                            <td>{{$contract->amount}}</td>
                            <td>{{$contract->check_num}}</td>
                            <td>{{$contract->phone}}</td>
                            <td>{{$contract->id_num}}</td>
                            <td>{{$contract->part_number}}</td>

                        </tr>

                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">


    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-header" style="text-align: center;">
                بيانات السندات
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead style="font-family: Cairo;font-size: 18px;">
                        <tr style='text-align:center; font-family: Cairo;font-size: 18px;'>
                            <th>#</th>
                            <th>{{trans('admin.payddate')}}</th>
                            <th>{{trans('admin.paytotal')}}</th>
                        </tr>
                    </thead>


                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @if($inreciept != null)
                        @foreach($inreciept as $user)

                        <tr style='text-align:center'>
                            <td>{{$i}}</td>
                            <td>{{$user->date}}</td>
                            <td>{{$user->amount}}</td>

                        </tr>

                        @php
                        $i++;
                        @endphp
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<div class="row">

    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body" style="text-align: center; font-size: 18px;">

                <div class="row">
                    <div class="form-group row col-sm-12">
                        <div for="example-text-input" class="col-sm-6 col-form-label">{{trans('admin.contracttotal')}}</div>
                        <div class="col-sm-6">
                            @if($contract !=null)
                            {{$contract->amount}}
                            @else
                            -----
                            @endif
                        </div>
                    </div>

                    <div class="form-group row col-sm-12">
                        <div for="example-text-input" class="col-sm-6 col-form-label">{{trans('admin.paymentstotal')}}</div>
                        <div class="col-sm-6">
                            @if($inreciept !=null)
                            {{$inreciept->sum('amount')}}
                            @else
                            -----
                            @endif
                        </div>
                    </div>
                    <div class="form-group row col-sm-12">
                        <div for="example-text-input" class="col-sm-6 col-form-label">{{trans('admin.subtotal')}}</div>
                        <div class="col-sm-6">
                            @if($inreciept !=null && $contract !=null)
                            {{$contract->amount - $inreciept->sum('amount')}}
                            @else
                            -----
                            @endif
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
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
</script>
<!-- Required datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('assets/pages/datatables.init.js') }}"></script>
@endsection