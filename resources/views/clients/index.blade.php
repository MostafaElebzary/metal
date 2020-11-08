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
                {{trans('admin.cpanel')}}
            </li>
            <li class="breadcrumb-item"> {{trans('admin.operationsOnClientsArchieve')}}
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
                            <th>{{trans('admin.client_name')}}</th>
                            <th>{{trans('admin.id_num')}}</th>
                            <th>{{trans('admin.phone')}}</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($clients as $user)

                        <tr style='text-align:center'>
                            <td>{{$i}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->id_num}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                @php
                                $user_id=auth()->user()->id;
                                $permission =App\Permission::where('user_id',$user_id)->first();
                                @endphp
                                @if($permission->deleteinbox == 'yes')

                                <a class='btn btn-raised btn-success btn-sml'data-placement="top"
                                                       title="تعديل بيانات العميل" href=" {{url('client/'.$user->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                @endif
                                <a class='btn btn-raised btn-info btn-sml'data-placement="top"
                                                       title="المدفوعات" href=" {{url('client/'.$user->id)}}"><i class="fa fa-money"></i></a>
                                <a class='btn btn-raised btn-secondary btn-sml' data-placement="top"
                                                       title="المرفقات" href=" {{url('clientfiles/'.$user->id)}}"><i class="fa fa-file"></i></a>
                                <button type="button" data-placement="top" title="ارسال رساله"
                                class="btn btn-raised btn-info btn-sml" data-inboxidd="{{$user->id}}" id="send" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i></button>


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
<!-- send message -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">{{trans('admin.sendmessage')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                {{ Form::open( ['url' => ['clientsendmessage'],'method'=>'post'] ) }}
                {{ csrf_field() }}
                <div class="form-group row">

                    <label for="example-text-input" class="col-sm-2">{{trans('admin.fullname')}}</label>


                    <div class="col-sm-10">
                        <input type="text" name="fullname" id="fullname1" class="input-name form-control  text-right " readonly placeholder="{{trans('admin.fullname')}}" required />
                        <input type="hidden" name="inbox_id" id="inbox_id" class="input-name form-control  text-right " required />

                    </div>
                </div>
                <!-- Field 2 -->

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.phone')}}</label>

                    <div class="col-sm-10">
                        <input type="number" name="phone" id='phone1' class="input-email form-control text-right" placeholder="{{trans('admin.phone')}}" min="12" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.message')}}</label>

                    <div class="col-sm-10">
                        <textarea name="message" class="textarea-message hight-82 form-control text-right" placeholder="{{trans('admin.message')}}" rows="3" min="10" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit( trans('admin.send') ,['class'=>'btn btn-info']) }}
                {{ Form::close() }}
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">{{trans('admin.close')}}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('script')
<script>
    var idd;
    $(document).on('click', '#send', function() {
        console.log(idd);
        idd = $(this).data('inboxidd');
        console.log(idd);
        $.ajax({
            url: "client_data/" + idd,
            dataType: "json",
            success: function(html) {
                $('#fullname1').val(html.data.name);
                $('#phone1').val(html.data.phone);

            }
        })
    });
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