@extends('layouts.app')

@section('title',  __('app.my.courses'))

@section('content')
<div class="container my-5">
    
    <div class="bg-white px-3 py-4 shadow-sm training-header rounded overflow-hidden">
        <p class="h2">{{ __('app.my.courses') }}</p>
        <br>
        @empty( $user->courses->first() )
            <div class="alert alert-info text-dark">
                Вы еще не записались на курсы. <a href="{{ route('search') }}" class="text-primary">Вернуться на страницу все курсы</a>
            </div>
        @else
            <div class="card-columns lessons">
                @foreach($user->courses as $course)
                    @include('include.card')
                @endforeach
            </div>
        @endempty
    </div>
</div><br><br><br><br><br><br><br>
@endsection



