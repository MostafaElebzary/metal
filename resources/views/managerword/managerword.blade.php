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
                {{trans('admin.managerhint')}}
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


                {!! Form::model($managerword, ['route' => ['managerword.update',$managerword->id] , 'method'=>'put' ,'files'=> true]) !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.Name_ar')}}</label>

                            <div class="col-sm-10">
                                <input name="name_ar" class="form-control" type="text" value="{{$managerword->name_ar}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.Name_en')}}</label>

                            <div class="col-sm-10">
                                <input name="name_en" class="form-control" type="text" value="{{$managerword->name_en}}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.position_ar')}}</label>

                            <div class="col-sm-10">
                                <input name="position_ar" class="form-control" type="text" value="{{$managerword->position_ar}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.position_en')}}</label>

                            <div class="col-sm-10">
                                <input name="position_en" class="form-control" type="text" value="{{$managerword->position_en}}" required>
                            </div>
                        </div>

                      
                    </div>
                    <div class="col-sm-6">

                    <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.desc_ar')}}</label>

                            <div class="col-sm-10">
                                <!-- <input name="desc_ar" class="form-control" type="text" value="{{$managerword->desc_ar}}" required> -->
                                <textarea name="desc_ar" class="form-control" required>{{$managerword->desc_ar}}</textarea>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.desc_en')}}</label>

                            <div class="col-sm-10">
                                <!-- <input name="desc_en" class="form-control" type="textarea" value="{{$managerword->desc_en}}" required> -->
                                        <textarea name="desc_en" class="form-control" required>{{$managerword->desc_en}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.managerimage')}}</label>

                            <div class="col-sm-10">
                                {{ Form::file('image',array('class'=>'form-control')) }}
                                <img src="{{url('uploads/manager/'.$managerword->image) }}" style="width:150px;height:150px;" />

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