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
            <li class="breadcrumb-item"><a href="{{url('client')}}">
                    {{trans('admin.ClientsList')}}</a>
            </li>
            <li class="breadcrumb-item">
                    {{trans('admin.payments')}}
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

                <table id="datatable" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead style="font-family: Cairo;font-size: 18px;">
                        <tr style='text-align:center; font-family: Cairo;font-size: 18px;'>
                            <th>#</th>
                            <th>{{trans('admin.reciept_num')}}</th>
                            <th>{{trans('admin.reciepttype')}}</th>
                            <th>{{trans('admin.recieptDate')}}</th>
                            <th>{{trans('admin.client_name')}}</th>
                            <th>{{trans('admin.amount')}}</th>
                            <th>{{trans('admin.descri')}}</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($reciepts as $user)

                        <tr style='text-align:center'>
                            <td>{{$i}}</td>
                            <td>{{$user->id}}</td>
                            <td>{{$user->type}}</td>
                            <td>{{$user->date}}</td>
                            <td>{{$user->getClient->name}}</td>
                            <td>{{$user->amount}}</td>
                            <td>{{$user->desc}}</td>
                            <td>
                                <a class='btn btn-raised btn-info btn-sml' target="_blank" href="{{url('recipts/'.$user->id)}}"><i class="fa fa-print"></i></a>
                                @php
                                $user_id=auth()->user()->id;
                                $permission =App\Permission::where('user_id',$user_id)->first();
                                @endphp
                                @if($permission->deleteinbox == 'yes')

                                <form method="get" id='delete-form-{{ $user->id }}' action="{{url('recipts/'.$user->id.'/delete')}}" style='display: none;'>
                                    {{csrf_field()}}
                                    <!-- {{method_field('delete')}}   -->
                                </form>
                                <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                      {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $user->id }}').submit();
                      }else {
                            event.preventDefault(); 
                      }
                      
                      " class='btn btn-raised btn-danger btn-sml' href=" "><i class="fa fa-trash" aria-hidden='true'>
                                    </i>
                                </button>
                                @endif
                            </td>
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

            <div class="card-header" style="text-align: center;">
                <strong> اجمالى المدفوعات للعميل
                    <p> {{$reciepts->first()->getClient->name}} </p>
                </strong>
            </div>
            <div class="card-body">
                @php
                $total = $reciepts->sum('amount');
                @endphp

                <div class="form-group row" style="text-align: center;">
                    <label for="example-text-input" class="col-sm-3"><b>الاجمالى</b></label>

                    <div class="col-sm-3">
                        <p>{{$total}}</p>
                    </div>
                    <div class="col-sm-6">
                        <?php

                        $obj = new I18N_Arabic('Numbers');

                        ?>

                        <p>{{$obj->int2str($total)}}</p>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

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