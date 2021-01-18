@extends('layouts.app')

@section('title', __('app.authorization'))

@section('content')<br>
<div class="container">
    @include('messages.error_success')
    <br>
    <div class="row justify-content-center">
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header h2 py-3">{{ __('app.already.register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                {{ __('app.email') }}
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('app.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('app.to.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('app.login') }}
                                </button>

                              {{--   @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('app.login.forgot') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer" bac></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header h2 py-3">{{ __('app.first.time.on') }}</div>

                <div class="card-body">
                    <p>{{ __('app.to.continue') }}</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        {{ __('app.register') }}
                    </a>
                </div>

                <div class="card-footer" bac></div>
            </div>
        </div>
    </div>
</div><br><br><br><br>
@endsection
