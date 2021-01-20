@extends('admin.layouts.app')

@section('title', 'Главная')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')
	<h5>Панель администратора</h5>
	<h2>Добро пожаловать, {{ Auth::user()->name.' '.Auth::user()->surname }}</h2>
	<hr>
	
</main>

@endsection
