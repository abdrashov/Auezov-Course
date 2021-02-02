@extends('admin.layouts.app')

@section('title', $category->title)

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">id</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $category->id }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Название ru</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $category->title }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Название kk</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $category->title_kk }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<b class="col-form-label">Название en</b>
		</div>
		<div class="col-sm-10">
			<p>{{ $category->title_en }}</p>
		</div>
	</div>

	
</main>

@endsection
