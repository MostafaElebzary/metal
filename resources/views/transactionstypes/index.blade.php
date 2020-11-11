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
                 {{trans('admin.transactions')}}
            </li>
                <li class="breadcrumb-item">   
                {{trans('admin.transactionstype')}}

                    
                    </li>
 

            </ol>
        </div>
    </div>
<!-- end page title end breadcrumb -->
@endsection

@section('content')
               

@include('layouts.errors')
 

 
<div class="row"  >
                 

                             
                    <div class="col-12">
                    <div>
                                  <a href="{{url('transactionstypes/create')}}  " class="btn btn-info btn-block">{{trans('admin.createtransactionstypes')}} </a>
                                </div >
                        <div class="card m-b-20">
                            <div class="card-body">

                                <table  id="datatable" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr style='text-align:center'>
                                        <!--<th >{{trans('admin.code')}}</th>-->
                                        <th>{{trans('admin.transactionname')}}</th>
                                        <th>{{trans('admin.status')}}</th> 
                                        <th>{{trans('admin.transactiontype')}}</th> 

                                        <th></th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($transactions_type as $user)

                                    <tr style='text-align:center'>
                                     <!--<td>{{$user->code}}</td>-->
                                     <td>{{$user->name}}</td>
                                     <td>{{trans('admin.'.$user->status)}} </td>    
                                     <td>{{trans('admin.'.$user->type)}} </td>    
                                     <td> <a class='btn btn-raised btn-success btn-sml'  data-placement="top"
                                                       title="  تعديل " href=" {{url('transactionstypes/'.$user->id.'/edit')}}" ><i class="fa fa-edit"></i></a> 
                      
                      <form method="get" id='delete-form-{{ $user->id }}' action="{{url('transactionstypes/'.$user->id.'/delete')}}" 
                      style='display: none;'>
                      {{csrf_field()}}
                      <!-- {{method_field('delete')}}   -->
                      </form>
                      <button  data-placement="top"
                                                       title="  حذف " onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                      {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $user->id }}').submit();
                      }else {
                            event.preventDefault(); 
                      }
                      
                      "
                  class='btn btn-raised btn-danger btn-sml' href=" "><i class="fa fa-trash" aria-hidden='true'>
                    </i > 
                  
                    
                    </button>
 
                    
                    </td>                                
                                    </tr>
                                   
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

