@extends('admin.layouts.app')

@section('title', 'Добавить тесты')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="mt-4 mb-3">
		<h1 class="h1">Добавить тесты</h1>
	</div>

	<form action="{{ route('admin.tests.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-6">
				<input type="hidden" name="training_id[]" value="{{ $training_id }}">
				<div class="mb-1">
					<label class="col-form-label">Вопрос</label>
					<textarea name="question[]" class="form-control-sm form-control" placeholder="Вопрос" required>{{ old('question') }}</textarea>
				</div>
				<div class="mb-1">
					<label class="col-form-label">Правильный ответ</label>
					<input type="text" name="right[]" class="form-control-sm form-control"placeholder="Правильный ответ" required  value="{{ old('right') }}">
				</div>
				<div class="mb-1">
					<label class="col-form-label">Неправильный ответ</label>
					<input type="text" name="wrong1[]" class="form-control-sm form-control"placeholder="Неправильный ответ" required  value="{{ old('wrong1') }}">
				</div>
				<div class="mb-1">
					<label class="col-form-label">Неправильный ответ</label>
					<input type="text" name="wrong2[]" class="form-control-sm form-control"placeholder="Неправильный ответ" required  value="{{ old('wrong2') }}">
				</div>
				<div class="mb-1">
					<label class="col-form-label">Неправильный ответ</label>
					<input type="text" name="wrong3[]" class="form-control-sm form-control"placeholder="Неправильный ответ" required  value="{{ old('wrong3') }}">
				</div>
			</div>
			<button type="button" class="col-12 btn btn-link createBtn">Добавить блок</button>
		</div>
		<div class="text-left">
			<button class="btn btn-primary">Добавить тесты</button>
		</div>
	</form>
</main>
<div class="d-none">
	<div class="createBlock col-6">
		<input type="hidden" name="training_id[]" value="{{ $training_id }}">
		<div class="mb-1">
			<label class="col-form-label">Вопрос</label>
			<textarea name="question[]" class="form-control-sm form-control" placeholder="Вопрос" required></textarea>
		</div>
		<div class="mb-1">
			<label class="col-form-label">Правильный ответ</label>
			<input type="text" name="right[]" class="form-control-sm form-control"placeholder="Правильный ответ" required>
		</div>
		<div class="mb-1">
			<label class="col-form-label">Неправильный ответ</label>
			<input type="text" name="wrong1[]" class="form-control-sm form-control"placeholder="Неправильный ответ" required>
		</div>
		<div class="mb-1">
			<label class="col-form-label">Неправильный ответ</label>
			<input type="text" name="wrong2[]" class="form-control-sm form-control"placeholder="Неправильный ответ" required>
		</div>
		<div class="mb-1">
			<label class="col-form-label">Неправильный ответ</label>
			<input type="text" name="wrong3[]" class="form-control-sm form-control"placeholder="Неправильный ответ" required>
		</div>
		<p class="btn btn-sm btn-danger deleteBtn">Удалить блок</p>
	</div>
</div>

@endsection
