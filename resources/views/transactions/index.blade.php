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
            <li class="breadcrumb-item">
                <a href="{{ url('transactions')}}"> {{trans('admin.transactions')}}
                </a>
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
        <!-- <div class='row'>
            <div class="col-6">
                <a href="{{url('importcreate')}}" class="btn btn-info btn-block">{{trans('admin.createimporttransaction')}} </a>
            </div>
            <div class="col-6">
                <a href="{{url('transactions/create')}}  " class="btn btn-info btn-block">{{trans('admin.createexporttransaction')}} </a>
            </div>
        </div> -->
        <div class="card m-b-20">
            <div class="card-body">

                <div class="breadcrumb-wrapper col-xs-12">
                    {!! Form::open(['url' => ['search'] , 'method'=>'post']) !!}
                    {!! csrf_field() !!}
                    <div class='row'>
                    @if( Auth::user()->type =="admin")
                        <div class="col-6">

                            <select name="user" id="user" class='form-control'>
                                <option value="all">{{trans('admin.allemployees')}}</option>

                                @php
                                $emp = App\User::all();
                                @endphp
                          
                                @foreach($emp as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>

                                @endforeach
                            </select>
                        </div>
                      

                        <div class="col-6">
                            {!! Form::select('type', ['all'=>(trans('admin.importandexport')),'export'=>(trans('admin.export')) ,'import'=>(trans('admin.import'))] , old('type'), ['class'=>'form-control',null]) !!}

                        </div>
                        @else
                        <div class="col-12">
                            {!! Form::select('type', ['all'=>(trans('admin.importandexport')),'export'=>(trans('admin.export')) ,'import'=>(trans('admin.import'))] , old('type'), ['class'=>'form-control',null]) !!}

                        </div>
                        @endif
                    </div>
                    <br>

                    {{ Form::submit( trans('admin.search') ,['class'=>'btn btn-info col-12']) }}
                    {{ Form::close() }}
                </div>
                <br>

                <table id="datatable" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr style='text-align:center'>
                            <th>#</th>
                            <th>{{trans('admin.date')}}</th>
                            <th>{{trans('admin.number')}}</th>
                            <th>{{trans('admin.transactiontype')}}</th>
                            <th>{{trans('admin.description')}}</th>
                            <th>{{trans('admin.third_party')}}</th>
                            <th>{{trans('admin.attachments')}}</th>
                            <th>{{trans('admin.employee')}}</th>




                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($transactions as $user)

                        <tr style='text-align:center'>
                            <td>{{$i}}</td>
                            <td>{{$user->trans_date}}</td>
                            <td>{{$user->number}}</td>
                            <td>{{trans('admin.'.$user->type)}} </td>
                            <td>{{$user->desc}} </td>
                            <td>{{$user->getThirdparty->name}} </td>
                            <td>{{App\TransactionsAttachment::where('transaction_id',$user->id)->count()}}</td>
                            <td> {{$user->getUser->name}} </td>

                            <td>
                                @if($user->type == 'export')
                                <a class='btn btn-raised btn-success btn-sml'data-placement="top"
                                                       title="  تعديل " href=" {{url('transactions/'.$user->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                               @else
                                 <a class='btn btn-raised btn-success btn-sml' data-placement="top"
                                                       title="  تعديل " href=" {{url('transactions/'.$user->id.'/edit')}}"><i class="fa fa-edit"></i></a>

                                @endif

                                <a class='btn btn-raised btn-info btn-sml' data-placement="top"
                                                       title="  الملحقات " href=" {{url('attachment/'.$user->id)}}"><i class="fa fa-file"></i></a>
                                <a  class='btn btn-raised btn-blue-grey btn-sml' data-placement="top"
                                                       title="  الباركود " target="_blank" href=" {{url('barcode/'.$user->id)}}"><i class="fa fa-barcode"></i></a>

                                <form method="get" id='delete-form-{{ $user->id }}' action="{{url('transactions/'.$user->id.'/delete')}}" style='display: none;'>
                                    {{csrf_field()}}
                                    <!-- {{method_field('delete')}}   -->
                                </form>
                                <button data-placement="top"
                                                       title="  حذف " onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                      {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $user->id }}').submit();
                      }else {
                            event.preventDefault(); 
                      }
                      
                      " class='btn btn-raised btn-danger btn-sml' href=" "><i class="fa fa-trash" aria-hidden='true'>
                                    </i>


                                </button>


                            </td>
                        </tr>
                        @php
                        $i=$i +1;
                        @endphp

                        @endforeach
                    </tbody>
                </table>

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