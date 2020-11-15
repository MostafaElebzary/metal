<!DOCTYPE html>
<html>

<head>
    <title> طباعه سند </title>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

    <!-- Basic Css files -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

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

    <div style="text-align:center; padding-top:50px;" class="row">
        <div class="form-group row">
            <div class="col-sm-2">
                <!-- // echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($reciept->id, 'QRCODE',3,3) . '" alt="barcode"   />'; -->
                @php
                $id = strval($reciept->id);
                @endphp

                <!-- //QRCODE must have string  -->
                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($id, 'QRCODE',6,6)}}" alt="barcode" />

            </div>
            <div class="col-sm-10" style="text-align:center">

                <img src="{{url('uploads/'. $maindata->logo)}}" width="200px" height="200px">

            </div>


            <div style=" padding-top:10px;font-family: 'Cairo';font-size: 22px;text-align:right" class="col-sm-7">

{{--                <p><strong>{{$maindata->name_ar}}</strong></p>--}}

            </div>
            <div class="col-sm-8 form-group" style=" font-family: 'Cairo';font-size: 20px;text-align:right">

                <strong>سند {{$reciept->type}}</strong> / {{$reciept->id}}

            </div>

            <div class="col-sm-12 form-group" style="text-align:right;padding-right:50px">

                <strong>المبلغ </strong> / {{$reciept->amount}} ر.س

            </div>
            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <?php

                    $obj = new I18N_Arabic('Numbers');

                    ?>
                    <strong>مبلغ وقدرة </strong> / {{$obj->int2str($reciept->amount)}} <strong> ر.س فقط لا غير</strong>
                </div>
            </div>
            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    @if($reciept->type == 'صرف')
                    <strong>استلمت انا </strong>
                    @else
                    <strong> استلمنا من المكرم </strong>
                    @endif
                    / {{$reciept->getClient->name}}
                </div>
            </div>
            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <strong> بتاريخ </strong> / {{date('d-m-Y', strtotime($reciept->date))}}
                </div>
            </div>



            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <strong> نوع السداد </strong> / {{$reciept->pay_type}}
                </div>
            </div>

            <div class="col-sm-12 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <strong> وذلك </strong> / {{$reciept->desc}}
                </div>
            </div>
            @if($reciept->type != 'صرف')
            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <strong>اجمالى المتبقى </strong> / {{$subtotal}}
                </div>
            </div>
            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <strong> اجمالى مبلغ المشروع </strong> / {{$data_client->amount}}
                </div>
            </div>

            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <strong>رقم الصك </strong> / {{$data_client->check_num}}
                </div>
            </div>
            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <strong> رقم الجوال </strong> / {{$data_client->phone}}
                </div>
            </div>
            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                </div>
            </div>
            <div class="col-sm-6 form-group" style="text-align:right;padding-right:50px">
                <div>
                    <strong> رقم القطعه </strong> / {{$data_client->part_number}}
                </div>
            </div>


            @endif

        </div>
    </div>

    <div style="text-align:center; padding-top:100px;" class="row">

        <div style="padding-top: 200px;"></div>


        <div class="col-sm-12 form-group" style="text-align:center">
            <div>
                <p> {{$maindata->address_ar}} - {{$maindata->contact_number}}</p>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
