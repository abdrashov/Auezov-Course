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
    <div class="alert alert-success mb-0">
        <div class="container">
            {{ __(session()->get('message')) }}
        </div>
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning mb-0 shadow-sm">
        <div class="container text-dark">
            {{ __(session()->get('warning')) }}
        </div>
    </div>
@endif