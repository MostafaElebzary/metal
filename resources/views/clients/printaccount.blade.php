<!DOCTYPE html>
<html>

<head>
    <title> طباعه كشف حساب </title>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

    <!-- Basic Css files -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('front/css/icons.css')}}" rel="stylesheet" />

    <link href="{{ URL::asset('rtl/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('rtl/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('rtl/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


    <style>
        body {
            padding-top: 0%;

            font-family: 'Cairo';
            font-size: 17px;
        }

        a {
            border-bottom: 1px solid black;
            padding-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="row" style="text-align:center; padding-top:50px;">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="row">
                    <div class="form-group row">
                        <div class="col-sm-2" style=" padding-left:30px;">
                            <!-- // echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($reciept->id, 'QRCODE',3,3) . '" alt="barcode"   />'; -->
                            @php
                            $id = strval($contract->phone);
                            @endphp

                            <!-- //QRCODE must have string  -->
                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($id, 'QRCODE',6,6)}}" alt="barcode" />

                        </div>
                        <div class="row" style="text-align:center;padding-left:375px">
                            <div class="col-sm-9">

                                <img src="{{url('uploads/'. $maindata->logo)}}" width="120px" height="120px">

                            </div>


                            <div style=" padding-top:10px;font-family: 'Cairo';font-size: 22px;text-align:right" class="col-sm-7">

                                <p><strong>{{$maindata->name_ar}}</strong></p>

                            </div>
                        </div>
                        <!--  -->
                    </div>
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


                                <th>{{trans('admin.check_num')}}</th>
                                <th>{{trans('admin.phone')}}</th>
                                <th>{{trans('admin.id_num')}}</th>
                                <th>{{trans('admin.contractdate')}}</th>
                                <th>{{trans('admin.contracttotal')}}</th>

                                <th>#</th>
                            </tr>
                        </thead>


                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @if($contract != null)

                            <tr style='text-align:center'>
                                <td>{{$contract->check_num}}</td>
                                <td>{{$contract->phone}}</td>
                                <td>{{$contract->id_num}}</td>
                                <td>{{$contract->check_date}}</td>
                                <td>{{$contract->amount}}</td>
                                <td>{{$i}}</td>

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

                                <th>{{trans('admin.payddate')}}</th>
                                <th>{{trans('admin.paytotal')}}</th>
                                <th>#</th>
                            </tr>
                        </thead>


                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @if($inreciept != null)
                            @foreach($inreciept as $user)

                            <tr style='text-align:center'>

                                <td>{{$user->date}}</td>
                                <td>{{$user->amount}}</td>
                                <td>{{$i}}</td>

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
                            <div class="col-sm-6">
                                @if($contract !=null)
                                {{$contract->amount}}
                                @else
                                -----
                                @endif
                            </div>
                            <div for="example-text-input" class="col-sm-6 col-form-label">{{trans('admin.contracttotal')}}</div>

                        </div>

                        <div class="form-group row col-sm-12">
                            <div class="col-sm-6">
                                @if($inreciept !=null)
                                {{$inreciept->sum('amount')}}
                                @else
                                -----
                                @endif
                            </div>
                            <div for="example-text-input" class="col-sm-6 col-form-label">{{trans('admin.paymentstotal')}}</div>

                        </div>
                        <div class="form-group row col-sm-12">
                            <div class="col-sm-6">
                                @if($inreciept !=null && $contract !=null)
                                {{$contract->amount - $inreciept->sum('amount')}}
                                @else
                                -----
                                @endif
                            </div>
                            <div for="example-text-input" class="col-sm-6 col-form-label">{{trans('admin.subtotal')}}</div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <!--  -->





    <div style="padding-top: 200px;"></div>


    <div class="col-sm-12 form-group" style="text-align:center">
        <div>
            <p> {{$maindata->address_ar}} - {{$maindata->contact_number}}</p>
        </div>
    </div>



    <script>
        window.print();
    </script>
</body>

</html>