@extends('layouts.master')

@section('css')
@endsection
@push('js')
<?php

$lat = !empty($map_info->lat) ? $map_info->lat : '30.044352632821397';
$lng = !empty($map_info->lng) ? $map_info->lng : '31.223632812499993';

?>
<script src="{{url('assets/js/locationpicker.jquery.js')}}"></script>

<script>
    $('#us1').locationpicker({
        location: {
            latitude: {{$lat}},
            longitude: {{$lng}}
        },

        radius: 300,
        markerIcon: "{{url('front/img/map-marker.png')}}",
        inputBinding: {
            latitudeInput: $('#lat'),
            longitudeInput: $('#lng')
            // radiusInput: $('#us2-radius'),
            // locationNameInput: $('#us2-address')
        }

    });
</script>
@endpush
@section('breadcrumb')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
            <div class="page-title-box">
                     <div class="btn-group pull-right">
                         <ol class="breadcrumb hide-phone p-0 m-0">
                             <li class="breadcrumb-item"><a href="#"></a></li>
                             <li class="breadcrumb-item active"></li>
                         </ol>
                     </div>
                     <h4 class="page-title"></h4>
            </div>
    </div>
</div>
 <!-- end page title end breadcrumb -->
@endsection

@section('content')
             <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-25">
                            <div class="card-body" >
                            {!! Form::model($map_info, ['route' => ['map.update',$map_info->id] , 'method'=>'put' ,'files'=> true]) !!}
                {{ csrf_field() }}
                    <input type="hidden" value="{{$lat}}" id="lat" name="lat">
                    <input type="hidden" value="{{$lng}}" id="lng" name="lng">
                    <div class="form-group">
                    <div id="us1" class="gmaps" ></div>

                    </div>
                </div>



                {{ Form::submit( trans('admin.edit') ,['class'=>'btn btn-info btn-block']) }}
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    {{ Form::close() }} 
 
@endsection

@section('script')
<!-- google maps api -->
<!-- i comment 3 line java script in map  -->

<script src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDPN_XufKy-QTSCB68xFJlqtUjHQ8m6uUY"></script>
<!-- Gmaps file -->
<script src="{{ URL::asset('assets/plugins/gmaps/gmaps.min.js') }}"></script>
<!-- demo codes -->
<script src="{{ URL::asset('assets/pages/gmaps.js') }}"></script>
@endsection

