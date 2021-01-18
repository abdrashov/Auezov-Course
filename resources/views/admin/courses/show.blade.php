@extends('admin.layouts.app')

@section('title', $course->title)

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')
	<h1 class="h2">{{ $course->title }}</h1>

	<div class="row">
		<div class="col-2">
			<b class="col-form-label">id</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $course->id }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Название</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $course->title }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Категория</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $course->category->title }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Описание</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $course->description }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Статус</b>
		</div>
		<div class="col-sm-10">
			<p>Курс {{ $course->isStatus() }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Начало</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $course->dateStart() }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Конец</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $course->dateEnd() }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Язык</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $course->lang }}</p>
		</div>
	</div>
	<br>
	<div class="form-group">
		<img src="{{ Storage::url($course->image) }}" class="img-thumbnail" width="300"  alt="">
	</div>
	
</main>

@endsection
