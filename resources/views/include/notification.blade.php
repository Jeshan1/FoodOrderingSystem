@if ($msg = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{$msg}}</strong>
    </div>
@endif

@if ($msg = Session::get('error'))
    <div class="alert alert-success">
        <strong>{{$msg}}</strong>
    </div>
@endif

@if ($msg = Session::get('warn'))
    <div class="alert alert-success">
        <strong>{{$msg}}</strong>
    </div>
@endif