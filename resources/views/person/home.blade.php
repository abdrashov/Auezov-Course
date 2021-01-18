@extends('layouts.app')

@section('title', __('app.profile'))

@section('content')
<div class="container my-5"> 
    @include('messages.error_success')
    <div class="bg-white mt-4 px-3 py-4 shadow-sm training-header rounded overflow-hidden">
        <p class="h2">{{ __('app.profile') }}</p>
        <div class="row d-flex">
            <div class="col-md-4 text-center">
                <div class="d-flex justify-content-center mb-2">
                    <div class="profile-avatar overflow-hidden rounded-circle">
                        <img class="profile-avatar-img" src="{{ Storage::url($user->image) }}" alt="">
                    </div>
                </div>
                <p class="h3">{{ $user->surname." ".$user->name }}</p>
            </div>
            <div class="col-md-8">
                <form action="" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">
                            {{ __('app.surname') }}
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $user->surname }}" required disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">
                            {{ __('app.name') }}
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">
                            {{ __('app.email') }}
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">
                            {{ __('app.rights') }}
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $user->isAdmin() }}" required disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">
                            {{ __('app.image') }}
                        </label>
                        <div class="col-md-8">
                           <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" disabled name="img">
                                    <label class="custom-file-label">{{ $user->image }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                   {{--  <div class="text-right">
                        <button type="button" class="px-4 btn btn-secondary active">Сохранить</button>
                    </div>  --}}
                </form>
            </div>
        </div>
    </div>
</div><br><br><br>
@endsection



