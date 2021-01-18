@extends('admin.layouts.app')

@section('title', 'Добавить лекцию')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="mt-4 mb-3">
		<h1 class="h1">Добавить лекцию</h1>
	</div>

	<form action="{{ route('admin.lessons.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="module_id" value="{{ $module_id }}">
		<div class="row">
			<div class="form-group col-10 row">
				<label for="index" class="col-sm-2 col-form-label">Индекс</label>
				<div class="col-sm-10">
					<input type="number" name="index[]" class="form-control" id="index" placeholder="Индекс" required  value="{{ old('index') }}">
				</div>
			</div>
			<div class="form-group col-10 row">
				<label for="title" class="col-sm-2 col-form-label">Название</label>
				<div class="col-sm-10">
					<input type="text" name="title[]" class="form-control" id="title" placeholder="Название" required  value="{{ old('title') }}">
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
			<label for="index" class="col-sm-2 col-form-label">Индекс</label>
			<div class="col-sm-10">
				<input type="number" name="index[]" class="form-control" id="index" placeholder="Индекс" required>
			</div>
		</div>
		<div class="form-group row col-10">
			<label for="title" class="col-sm-2 col-form-label">Название</label>
			<div class="col-sm-10">
				<input type="text" name="title[]" class="form-control" id="title" placeholder="Название" required>
			</div>
		</div>
		<p class="col-2 btn btn-danger deleteBtn">Удалить</p>
	</div>
</div>
@endsection
