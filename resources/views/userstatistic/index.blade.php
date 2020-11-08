@extends('layouts.master')

@section('css')
@if(session('lang')=='en')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@else
<!-- DataTables -->
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

            <li class="breadcrumb-item"> {{trans('admin.userstatistics')}}
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
                {{ Form::open( ['url' => ['userstatistics'],'method'=>'post'] ) }}
                {{ csrf_field() }}
                <div class="">
                    <div class="form-group col-sm-12 row">
                        <label for="example-text-input" class="col-sm-2">{{trans('admin.branchs')}}</label>

                        <div class="col-sm-10">
                            
                            {{ Form::select('branch_id',App\Branch::pluck('name','id'),$branch_id
                         ,["class"=>"form-control branch_id " ]) }}

                        </div>
                    </div>
                </div>

                {{ Form::submit( trans('admin.search') ,['class'=>'btn btn-info btn-block']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

<div class="row">


    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="card-header" style="text-align: center;">
                    <strong>سندات القبض</strong>
                </div>

                <table id="datatable" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead style="font-family: Cairo;font-size: 18px;">
                        <tr style='text-align:center; font-family: Cairo;font-size: 18px;'>
                            <th>#</th>
                            <th>{{trans('admin.username')}}</th>
                            <th>{{trans('admin.countReciept')}}</th>
                            <th>{{trans('admin.total')}}</th>

                        </tr>
                    </thead>


                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($users as $key=> $data)

                        <tr style='text-align:center'>
                            <td>{{$i}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->Reciept->where('type', 'قبض')->count()}}</td>
                            <td>{{$data->Reciept->where('type', 'قبض')->sum('amount')}}</td>

                        </tr>

                        @php
                        $i++;
                        @endphp

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<div class="row">


    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="card-header" style="text-align: center;">
                    <p>اجمالى تحصيل كل الموظفين </p>
                    <strong>{{ $reciept}}</strong>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">


    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="card-header" style="text-align: center;">
                    <strong>سندات الصرف</strong>
                </div>

                <table id="datatable" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead style="font-family: Cairo;font-size: 18px;">
                        <tr style='text-align:center; font-family: Cairo;font-size: 18px;'>
                            <th>#</th>
                            <th>{{trans('admin.username')}}</th>
                            <th>{{trans('admin.countReciept')}}</th>
                            <th>{{trans('admin.totalout')}}</th>

                        </tr>
                    </thead>


                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($users as $key=> $data)

                        <tr style='text-align:center'>
                            <td>{{$i}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->Reciept->where('type', 'صرف')->count()}}</td>
                            <td>{{$data->Reciept->where('type', 'صرف')->sum('amount')}}</td>

                        </tr>

                        @php
                        $i++;
                        @endphp

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection

@section('script')
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