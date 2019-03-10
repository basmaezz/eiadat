@if(count($errors->all()) > 0)
    <div class="alert alert-warning">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        <center>
            <h4><i class="fa fa-info"></i> {{session('success')}}</h4>
        </center>
    </div>
    @endif



@if(session()->has('error'))
    <div class="alert alert-danger">
        <center>
            <h4><i class="fa fa-info-circle"></i> {{session('error')}}</h4>
        </center>
    </div>
@endif