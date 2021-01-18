@extends('admin.layouts.app')

@section('title', 'Добавить лекцию')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="mt-4 mb-3">
		<h1 class="h1">Добавить лекцию</h1>
	</div>

	<form action="{{ route('admin.lectures.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="course" value="{{ $course_id }}">
		<div class="row">
			<div class="form-group row col-10">
				<label class="col-sm-2 col-form-label">Индекс</label>
				<div class="col-sm-10">
					<input type="number" name="index[]" class="form-control" placeholder="Индекс" required  value="{{ old('index') }}">
				</div>
			</div>
			<div class="form-group row col-10">
				<label class="col-sm-2 col-form-label">Лекция</label>
				<div class="col-sm-10">
					<input type="file" name="lecture[]" class="form-control" placeholder="Лекция" >
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-link createBtn">Добавить блок</button><br>
		<div class="text-right">
			<button class="btn btn-primary">Добавить лекцию</button>
		</div>
	</form>
</main>
<div class="d-none">
	<div class="createBlock row">
		<div class="form-group row col-10">
			<label class="col-sm-2 col-form-label">Индекс</label>
			<div class="col-sm-10">
				<input type="number" name="index[]" class="form-control" placeholder="Индекс" required >
			</div>
		</div>
		<div class="form-group row col-10">
			<label class="col-sm-2 col-form-label">Лекция</label>
			<div class="col-sm-10">
				<input type="file" name="lecture[]" class="form-control" placeholder="Лекция" required>
			</div>
		</div>
		<p class="col-2 btn btn-danger deleteBtn">Удалить</p>
	</div>
</div>
@endsection
