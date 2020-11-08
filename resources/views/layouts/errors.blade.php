
@if(Session::has('errors'))
    <div class="alert alert-danger">
     @foreach ($errors->all() as  $value)

<p>{{ $value }}</p>

@endforeach
    </div>
@endif



@if(session('error'))
    <div class="alert alert-danger" role='alert'>
        {{session('error')}}
    </div>
@endif





@if(session('success'))
                <div class="alert alert-success" role='alert'>
                {{session('success')}}
                </div>
 @endif
