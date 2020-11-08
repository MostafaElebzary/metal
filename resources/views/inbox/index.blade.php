@extends('layouts.master')

@section('css')
@if(session('lang')=='en')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css') }}">

@else
<!-- DataTables -->
<link href="{{ URL::asset('rtl/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('rtl/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('rtl/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css') }}">

@endif

@endsection

@section('breadcrumb')
<!-- Page-Title -->
<br>
<div class="app-content content container-fluid">
    <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                {{trans('admin.websiteControll')}}
            </li>
            <li class="breadcrumb-item">{{trans('admin.inbox')}}

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
        <div>
            <!-- <a href="{{url('users/create')}}  " class="btn btn-info btn-block">{{trans('admin.createuser')}} </a> -->
        </div>
        <div class="card m-b-20">
            <div class="card-body">

                <table id="datatable" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead style="font-family: Cairo;font-size: 18px;">
                        <tr style='text-align:center; font-family: Cairo;font-size: 18px;'>
                            <th>#</th>
                            <th style='text-align:center; font-family: Cairo;font-size: 18px;'>{{trans('admin.fullname')}}</th>
                            <th style='text-align:center; font-family: Cairo;font-size: 18px;'>{{trans('admin.phone')}}</th>
                            <th style='text-align:center; font-family: Cairo;font-size: 18px;'>{{trans('admin.email')}}</th>
                            <th style='text-align:center; font-family: Cairo;font-size: 18px;'>{{trans('admin.message')}}</th>
                            <th style='text-align:center; font-family: Cairo;font-size: 18px;'></th>

                        </tr>
                    </thead>


                    <tbody>

                        @php
                        $i = 1;
                        @endphp
                        @foreach($inbox as $user)

                        <tr style='text-align:center'>
                            <td>{{$i}}</td>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->phone}} </td>
                            <td>{{$user->email}} </td>
                            <td>{{$user->message}} </td>
                            <td>
                                <button type="button" class="btn btn-raised btn-success btn-sml" data-inboxid="{{$user->id}}" id="show" data-toggle="modal" data-placement="top"
                                                       title="عرض الرساله" data-target=".bs-example-modal-sm"><i class="fa fa-eye"></i></button>
                                <button type="button" data-placement="top"
                                                       title="ارسال رسالة" class="btn btn-raised btn-info btn-sml" data-inboxidd="{{$user->id}}" id="send" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i></button>
                                <a class='btn btn-raised btn-primary btn-sml' data-placement="top"
                                                       title="عرض الرسائل المرسلة " href=" {{url('messageList/'.$user->id)}}"><i class="fa fa-list"></i></a>

                                @php
                          $user_id=auth()->user()->id;
                          $permission =App\Permission::where('user_id',$user_id)->first();
                            if($permission->deleteinbox == 'yes'){
                                @endphp
                                <form method="get" id='delete-form-{{ $user->id }}' action="{{url('inbox/'.$user->id.'/delete')}}" style='display: none;'>
                                    {{csrf_field()}}
                                    <!-- {{method_field('delete')}}   -->
                                </form>
                                <button data-placement="top"
                                                       title="حذف" onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                      {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $user->id }}').submit();
                      }else {
                            event.preventDefault(); 
                      }
                      
                      " class='btn btn-raised btn-danger btn-sml' href=" "><i class="fa fa-trash" aria-hidden='true'>
                                    </i>


                                </button>
                                @php
                            }
                            @endphp


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
<!-- show modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">{{trans('admin.showmessage')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.fullname')}}</label>


                    <div class="col-sm-10">
                        <input type="text" name="fullname" id='fullname' class="input-name form-control  text-right " placeholder="{{trans('admin.fullname')}}" readonly require />
                    </div>
                </div>
                <!-- Field 2 -->

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.email')}}</label>

                    <div class="col-sm-10">
                        <input type="email" name="email" id='email' class="input-email form-control text-right" placeholder="{{trans('admin.email')}}" readonly require />
                    </div>
                </div>
                <!-- Field 3 -->

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.phone')}}</label>

                    <div class="col-sm-10">
                        <input type="number" name="phone" id='phone' class="input-phone form-control text-right" placeholder="{{trans('admin.phone')}}" readonly require />
                    </div>
                </div>
                <!-- Field 4 -->

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2">{{trans('admin.message')}}</label>

                    <div class="col-sm-10">
                        <textarea name="message" id='message' class="textarea-message hight-82 form-control text-right" placeholder="{{trans('admin.message')}}" rows="3" readonly require></textarea>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">{{trans('admin.close')}}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- send message -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">{{trans('admin.sendmessage')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                {{ Form::open( ['url' => ['sendmessage'],'method'=>'post'] ) }}
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

<!-- /.modal -->


@endsection

@section('script')
<script>
    var id;
    $(document).on('click', '#show', function() {
        id = $(this).data('inboxid');
        console.log(id);
        $.ajax({
            url: "inbox/" + id,
            dataType: "json",
            success: function(html) {
                $('#fullname').val(html.data.fullname);
                $('#phone').val(html.data.phone);
                $('#email').val(html.data.email);
                $('#message').val(html.data.message);




            }
        })
    });


    var idd;
    $(document).on('click', '#send', function() {
        idd = $(this).data('inboxidd');
        console.log(idd);
        $.ajax({
            url: "inbox/" + idd + '/edit',
            dataType: "json",
            success: function(html) {
                $('#fullname1').val(html.data.fullname);
                $('#inbox_id').val(idd);
                $('#phone1').val(html.data.phone);

            }
        })
    });
</script>
<!-- Required datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/modernizr.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('assets/pages/datatables.init.js') }}"></script>

@endsection