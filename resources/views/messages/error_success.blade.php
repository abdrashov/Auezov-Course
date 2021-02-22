@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="my-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success shadow-sm">
        <div class="container">
            {!! __(session()->get('message')) !!}
        </div>
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger shadow-sm">
        <div class="container">
            {!! __(session()->get('error')) !!}
        </div>
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning shadow-sm">
        <div class="container text-dark">
            {!! __(session()->get('warning')) !!}
        </div>
    </div>
@endif