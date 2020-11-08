@extends('layouts.master')

@section('css')

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


            <li class="breadcrumb-item">
                {{trans('admin.maindata')}}
            </li>

        </ol>
    </div>
</div>
<!-- end page title end breadcrumb -->
@endsection

@section('content')



<div class="row" dir="rtl">
    <div class="col-12">
        @include('layouts.errors')

        <div class="card m-b-20">
            <div class="card-body" style="text-align:right">


                {!! Form::model($maindata, ['route' => ['maindata.update',$maindata->id] , 'method'=>'put' ,'files'=> true]) !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.Name_ar')}}</label>

                            <div class="col-sm-10">
                                <input name="name_ar" class="form-control" type="text" value="{{$maindata->name_ar}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.Name_en')}}</label>

                            <div class="col-sm-10">
                                <input name="name_en" class="form-control" type="text" value="{{$maindata->name_en}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.whatsapp')}}</label>

                            <div class="col-sm-10">
                                <input name="whatsapp" class="form-control" type="text" value="{{$maindata->whatsapp}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.email')}}</label>

                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="email" value="{{$maindata->email}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.instagram')}}</label>

                            <div class="col-sm-10">
                                <input name="instagram" class="form-control" type="text" value="{{$maindata->instagram}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.twitter')}}</label>

                            <div class="col-sm-10">
                                <input name="twitter" class="form-control" type="text" value="{{$maindata->twitter}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.facebook')}}</label>

                            <div class="col-sm-10">
                                <input name="facebook" class="form-control" type="text" value="{{$maindata->facebook}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.snapchat')}}</label>

                            <div class="col-sm-10">
                                <input name="snapchat" class="form-control" type="text" value="{{$maindata->snapchat}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.finishedproject')}}</label>

                            <div class="col-sm-10">
                                <input name="finishedproject" class="form-control" type="number" value="{{$maindata->finishedproject}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.inprogressproject')}}</label>

                            <div class="col-sm-10">
                                <input name="inprogressproject" class="form-control" type="number" value="{{$maindata->inprogressproject}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.coveredcities')}}</label>

                            <div class="col-sm-10">
                                <input name="coveredcities" class="form-control" type="number" value="{{$maindata->coveredcities}}" required>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-sm-6">

                    <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.winningaward')}}</label>

                            <div class="col-sm-10">
                                <input name="winningaward" class="form-control" type="number" value="{{$maindata->winningaward}}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.dayopenfrom')}}</label>

                            <div class="col-sm-10">
                                <input name="dayopenfrom" class="form-control" type="text" value="{{$maindata->dayopenfrom}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.dayopento')}}</label>

                            <div class="col-sm-10">
                                <input name="dayopento" class="form-control" type="text" value="{{$maindata->dayopento}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.houropenfrom')}}</label>

                            <div class="col-sm-10">
                                <input name="houropenfrom" class="form-control" type="time" value="{{$maindata->houropenfrom}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.houropento')}}</label>

                            <div class="col-sm-10">
                                <input name="houropento" class="form-control" type="time" value="{{$maindata->houropento}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.daysclosed')}}</label>

                            <div class="col-sm-10">
                                <input name="daysclosed" class="form-control" type="text" value="{{$maindata->daysclosed}}" required>
                            </div>
                        </div>
                                <!--  -->
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.contact_number')}}</label>

                            <div class="col-sm-10">
                                <input name="contact_number" class="form-control" type="text" value="{{$maindata->contact_number}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.address_ar')}}</label>

                            <div class="col-sm-10">
                                <input name="address_ar" class="form-control" type="text" value="{{$maindata->address_ar}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.address_en')}}</label>

                            <div class="col-sm-10">
                                <input name="address_en" class="form-control" type="text" value="{{$maindata->address_en}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.logo')}}</label>

                            <div class="col-sm-10">
                                {{ Form::file('logo',array('class'=>'form-control')) }}
                                <img src="{{url('uploads/'.$maindata->logo) }}" style="width:150px;height:150px;" />

                            </div>
                        </div>
                    </div>
                </div>












                {{ Form::submit( trans('admin.edit') ,['class'=>'btn btn-info btn-block']) }}
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

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