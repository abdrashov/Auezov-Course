@extends('admin.layouts.app')

@section('title', 'Редактировать лекцию')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="mt-4 mb-3">
		<h1 class="h1">Редактировать лекцию</h1>
	</div>
	
	<form action="{{ route('admin.lessons.update', $lesson->id) }}" method="post" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="form-group row">
			<label for="index" class="col-sm-2 col-form-label">Индекс</label>
			<div class="col-sm-10">
				<input type="number" name="index" class="form-control" id="index" placeholder="Индекс" required  value="{{ $lesson->index }}">
			</div>
		</div>
		<div class="form-group row">
			<label for="title" class="col-sm-2 col-form-label">Название</label>
			<div class="col-sm-10">
				<input type="text" name="title" class="form-control" id="title" placeholder="Название" required  value="{{ $lesson->title }}">
			</div>
		</div>
		<button class="btn btn-primary">Сохранить изменения</button>
	</form>
	
</main>

@endsection
