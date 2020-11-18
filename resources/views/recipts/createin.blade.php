@extends('layouts.master')

@section('css')
    <link href="{{url('css/select2.min.css')}}" rel="stylesheet"/>

    @if(session('lang')=='en')
        <!-- DataTables -->
        <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
              type="text/css"/>
        <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
              type="text/css"/>
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
              type="text/css"/>

    @else
        <!-- DataTables -->
        <link href="{{ URL::asset('rtl/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
              type="text/css"/>
        <link href="{{ URL::asset('rtl/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
              type="text/css"/>
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('rtl/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
              type="text/css"/>

    @endif
    <style>
        #parent {
            /* can be any value */
            width: 300px;
            text-align: right;
            direction: rtl;
            position: relative;
        }

        #parent .select2-container--open + .select2-container--open {
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
                    {{trans('admin.addinreciept')}}
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
                        <label for="example-text-input"
                               class="col-sm-2 col-form-label">{{trans('admin.recieptDate')}}</label>
                        <div class="col-sm-10">
                            <input name="type" class="form-control" type="hidden" value="قبض">
                            <input name="date" id="hijri-picker" class="form-control" type="text" value="{{old('date')}}"
                                   placeholder="{{trans('admin.date')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-sm-2 col-form-label">{{trans('admin.pay_type')}}</label>
                        <div class="col-sm-10">
                            {{ Form::select('pay_type', array('نقد'=>'نقد','شبكه'=>'شبكه'),old('pay_type')
                             ,["class"=>"form-control "]) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2">{{trans('admin.mainclient_name')}}</label>

                        <div class="col-sm-10" id="parent">

                            <select id="mainclient" class="itemName form-control" style="text-align-last: right;"
                                    name="mainclient_id">


                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2">{{trans('admin.client_name')}}</label>

                        <div class="col-sm-10" id="parent">

                            <select id="client" class=" form-control" style="text-align-last: right;"
                                    name="client_id">


                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-sm-2 col-form-label">{{trans('admin.amounts')}}</label>
                        <div class="col-sm-10">
                            <input name="amounts" id="amounts" class="form-control"
                                   placeholder="{{trans('admin.amounts')}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-sm-2 col-form-label">{{trans('admin.suubtotal')}}</label>
                        <div class="col-sm-10">
                            <input name="suubtotal" id="suubtotal" class="form-control"
                                   placeholder="{{trans('admin.suubtotal')}}" readonly>
                        </div>
                    </div>
                    <!--  -->

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2">{{trans('admin.phone')}}</label>

                        <div class="col-sm-10">
                            <input name="phone" id="phone" class="form-control" type="number" value="{{old('phone')}}"
                                   placeholder="{{trans('admin.phone')}}" readonly>
                        </div>
                    </div>


                    <!--  -->

                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-sm-2 col-form-label">{{trans('admin.amount')}}</label>
                        <div class="col-sm-10">
                            <input name="amount" id="amount" class="form-control" type="number"
                                   value="{{old('amount')}}" placeholder="{{trans('admin.amount')}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-sm-2 col-form-label">{{trans('admin.descri')}}</label>
                        <div class="col-sm-10">
                            <textarea name="desc" class="form-control"
                                      placeholder="{{trans('admin.descri')}}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="example-text-input" class="col-sm-2">{{trans('admin.sendsms')}}</label>
                        <div class="col-sm-10">
                            {{ Form::select('sendsms', array('yes'=>' نعم','no'=>'لا'),old('sendsms')
          ,["class"=>"form-control "]) }}
                        </div>

                    </div>
                    <!--  -->


                    {{ Form::submit( trans('admin.Add') ,['class'=>'btn btn-info btn-block']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div><!-- end col -->
        <!-- end row -->
        <div class="col-5">
            <table id="table" class="table table-striped  table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead style="font-family: Cairo;font-size: 18px;">
                <tr style='text-align:center; font-family: Cairo;font-size: 18px;'>

                    <th>{{trans('admin.check_num')}}</th>
                    <th>{{trans('admin.part_number')}}</th>
                    <th>{{trans('admin.scheme_number')}}</th>

                </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
        </div>
    </div>



@endsection

@section('script')
    <script>
        $(function () {
            $("#mainclient").on('change', function () {
                var id = document.getElementById("mainclient").value;
                console.log(id);

                $.ajax({
                    url: "/clientdata/" + id,
                    dataType: "json",
                    success: function (html) {
                        $('#client').empty();
                        $("#client").append('<option>--اختر مشروع--</option>');
                        if(html)
                        {
                            $.each(html.data_client,function(key,value){
                                $('#client').append($("<option/>", {
                                    value: value,
                                    text: key
                                }));
                            });
                            var res='';
                            $.each (html.data_client_table, function (key, value) {
                                res +=
                                    '<tr style="text-align:center; font-family: Cairo;font-size: 18px;">'+
                                    '<td>'+value.check_num+'</td>'+
                                    '<td>'+value.part_number+'</td>'+
                                    '<td>'+value.scheme_number+'</td>'+
                                    '</tr>';

                            });

                            $('tbody').html(res);
                        }

                    }
                })
            });
        });
    </script>

    <script>
        $(function () {
            $("#client").on('change', function () {
                var id = document.getElementById("client").value;
                console.log(id);

                $.ajax({
                    url: "/clientdata/" + id,
                    dataType: "json",
                    success: function (html) {

                        var amount = html.data_project.amount;
                        var phone = html.data_project.phone;
                        var pays = html.data_client_reciept;
                        var subtotal = amount - pays;
                        $('#amounts').val(amount);
                        $('#suubtotal').val(subtotal);
                        $('#phone').val(phone);

                    }
                })
            });
        });
    </script>




    <script type="text/javascript">
        $(function () {
            $('.itemName').select2({
                placeholder: '  ابحث باسم العميل او رقم الهويه او رقم جوال العميل',
                dir: 'rtl',
                dropdownParent: $('#parent'),
                ajax: {
                    url: '/select2-autocomplete-ajax',
                    dataType: 'json',
                    delay: 1500,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
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
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
