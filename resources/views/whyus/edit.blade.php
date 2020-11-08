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
            <li class="breadcrumb-item"><a href="{{ url('about') }}"> {{trans('admin.about')}}
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ url('whyus') }}"> {{trans('admin.whyus')}}
                </a>
            </li>
            <li class="breadcrumb-item">
                {{trans('admin.editwhyus')}}
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


                {!! Form::model($whyus, ['route' => ['whyus.update',$whyus->id] , 'method'=>'put' ,'files'=> true]) !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.icon')}}</label>

                            <div class="col-sm-10">
                            <i class="{{$whyus->icon}}"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.question_ar')}}</label>

                            <div class="col-sm-10">
                                <input name="question_ar" class="form-control" type="text" value="{{$whyus->question_ar}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.question_en')}}</label>

                            <div class="col-sm-10">
                                <input name="question_en" class="form-control" type="text" value="{{$whyus->question_en}}" required>
                            </div>
                        </div>
  

                    <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.answer_ar')}}</label>

                            <div class="col-sm-10">
                                <input name="answer_ar" class="form-control" type="text" value="{{$whyus->answer_ar}}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2">{{trans('admin.answer_en')}}</label>

                            <div class="col-sm-10">
                                <input name="answer_en" class="form-control" type="textarea" value="{{$whyus->answer_en}}" required>
                            </div>
                        </div>

                        

                {{ Form::submit( trans('admin.edit') ,['class'=>'btn btn-info btn-block']) }}
                    </div>
                     
                </div>











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