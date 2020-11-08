@extends('layouts.master')

@section('css')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    table,
    th,
    td {
        text-align: center;
        font-family: Cairo;
        font-size: 18px;
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
                لوحة التحكم
            </li>
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"> الموظفين والصلاحيات
                </a>
            </li>

            <li class="breadcrumb-item">
                تحديد صلاحيات موظف
            </li>

        </ol>
    </div>
</div>
<!-- end page title end breadcrumb -->
@endsection

@section('content')


@include('layouts.errors')

<div class="row" dir="rtl">
    <div class="col-12">
        @include('layouts.errors')

        <div class="card m-b-20">
            <div class="card-body" style="text-align:center">


                {!! Form::model($permission, ['route' => ['permission.update',$permission->id] , 'method'=>'put' ,'files'=> true]) !!}
                {{ csrf_field() }}


                <div class="form-group row">
                    <strong>{{trans('admin.Employee')}}

                        {{ Form::label('user_id',$permission->getUser->name,
                                                    $permission->user_id
                                                ,["class"=>"form-control " ]) }}

                    </strong>
                </div>


                <div class="form-group ">


                    <div class="table table-striped">
                        <table style="" cellspacing="0" width="50%">
                            <tbody>
                                <colgroup>
                                    <col span="1" style="width: 20%;">
                                    <col span="1" style="width: 20%;">

                                </colgroup>
                                <tr>

                                    <th>{{trans('admin.inbox')}}</th>
                                    <td>
                                        <label class="switch ">
                                            <input type="hidden" name="inbox" id='inbox' value="no">
                                            {{ Form::checkbox('inbox', 'yes',  $permission->inbox=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.candelete')}}</th>
                                    <td>


                                        <label class="switch ">
                                            <input type="hidden" name="deleteinbox" id='deleteinbox' value="no">
                                            {{ Form::checkbox('deleteinbox', 'yes',  $permission->deleteinbox=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.addClient')}}</th>
                                    <td>


                                        <label class="switch ">
                                            <input type="hidden" name="addclient" id='addclient' value="no">
                                            {{ Form::checkbox('addclient', 'yes',  $permission->addclient=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.addinreciept')}}</th>
                                    <td>


                                        <label class="switch ">
                                            <input type="hidden" name="addinreciept" id='addinreciept' value="no">
                                            {{ Form::checkbox('addinreciept', 'yes',  $permission->addinreciept=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.addoutreciept')}}</th>
                                    <td>


                                        <label class="switch ">
                                            <input type="hidden" name="addoutreciept" id='addoutreciept' value="no">
                                            {{ Form::checkbox('addoutreciept', 'yes',  $permission->addoutreciept=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.recieptsArchieve')}}</th>
                                    <td>


                                        <label class="switch ">
                                            <input type="hidden" name="recieptsarchieve" id='recieptsarchieve' value="no">
                                            {{ Form::checkbox('recieptsarchieve', 'yes',  $permission->recieptsarchieve=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.clientsArchieve')}}</th>
                                    <td>


                                        <label class="switch ">
                                            <input type="hidden" name="clientsArchieve" id='clientsArchieve' value="no">
                                            {{ Form::checkbox('clientsArchieve', 'yes',  $permission->clientsArchieve=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.operationsOnClients')}}</th>
                                    <td>
                                        <label class="switch ">
                                            <input type="hidden" name="operationsonclients" id='operationsonclients' value="no">
                                            {{ Form::checkbox('operationsonclients', 'yes',  $permission->operationsonclients=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.operationsOnClientsArchieve')}}</th>
                                    <td>
                                        <label class="switch ">
                                            <input type="hidden" name="operationsonclientsarchieve" id='operationsonclientsarchieve' value="no">
                                            {{ Form::checkbox('operationsonclientsarchieve', 'yes',  $permission->operationsonclientsarchieve=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.ClientAccountStatement')}}</th>
                                    <td>
                                        <label class="switch ">
                                            <input type="hidden" name="clientaccountstatement" id='clientaccountstatement' value="no">
                                            {{ Form::checkbox('clientaccountstatement', 'yes',  $permission->clientaccountstatement=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.websiteControll')}}</th>
                                    <td>
                                        <label class="switch ">
                                            <input type="hidden" name="websitepanel" id='websitepanel' value="no">
                                            {{ Form::checkbox('websitepanel', 'yes',  $permission->websitepanel=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.Controlpanel')}}</th>
                                    <td>
                                        <label class="switch ">
                                            <input type="hidden" name="controllpanel" id='controllpanel' value="no">
                                            {{ Form::checkbox('controllpanel', 'yes',  $permission->controllpanel=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.homeinreciept')}}</th>
                                    <td>
                                        <label class="switch ">
                                            <input type="hidden" name="homeinreciept" id='homeinreciept' value="no">
                                            {{ Form::checkbox('homeinreciept', 'yes',  $permission->homeinreciept=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{trans('admin.homeoutreciept')}}</th>
                                    <td>
                                        <label class="switch ">
                                            <input type="hidden" name="homeoutreciept" id='homeoutreciept' value="no">
                                            {{ Form::checkbox('homeoutreciept', 'yes',  $permission->homeoutreciept=="yes"?true:false) }}

                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>

 
                    </div>


                    </tbody>
                    </table>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


        {{ Form::submit( trans('admin.edit') ,['class'=>'btn btn-info']) }}
    </div>
    {{ Form::close() }}
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