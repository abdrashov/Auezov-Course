@section('header')
{{-- <div class="alert alert-danger mb-0">
    Сайт находится в стадии разработки, некоторые разделы еще не завершен,
</div> --}}
@admin
    <div class="bg-dark">
        <div class="container text-right py-3">
            <a class="text-info" href="{{ route('admin.index') }}">Панель администратора</a>
        </div>
    </div>
@endadmin
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-4">
    <div class="container">
        <a class="navbar-brand align-items-center d-flex" href="{{ route('/') }}">
            <img src="{{ asset('image/logo-new.png') }}" alt="Logo" style="width: 50px">
            <span class="h1 mb-0 ml-2 title">Auezov <small><small>{{ __('app.courses') }}</small></small></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto" style="font-size: 1rem">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('/') }}">{{ __('app.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('search') }}">{{ __('app.search') }}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('login') }}">
                            {{ __('app.login') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> 
                            {{ __('app.control.panel') }} 
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item  text-dark" href="{{ route('userCourse') }}">
                                {{ __('app.my.courses') }}
                            </a>
                            <a class="dropdown-item  text-dark" href="{{ route('home') }}">
                                {{ __('app.profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                {{ __('app.logout') }}
                            </a>
                        </div>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> 
                        {{ __('app.lang') }} 
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item  text-dark" href="{{ url('/kk') }}">
                            {{ __('app.kk') }} 
                        </a>
                        <a class="dropdown-item text-dark" href="{{ url('/') }}">
                            {{ __('app.ru') }}
                        </a>
                        <a class="dropdown-item text-dark" href="{{ url('/en') }}">
                            {{ __('app.en') }}
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
