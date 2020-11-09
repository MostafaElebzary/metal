
@if(Session::has('errors'))
    <div class="alert alert-danger" style="text-align: right;">
     @foreach ($errors->all() as  $value)

<p>{{ $value }}</p>

@endforeach
    </div>
@endif



@if(session('error'))
    <div class="alert alert-danger" role='alert' style="text-align: right;">
        {{session('error')}}
    </div>
@endif





@if(session('success'))
                <div class="alert alert-success" role='alert' style="text-align: right;">
                {{session('success')}}
                </div>
 @endif
