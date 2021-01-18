@extends('admin.layouts.app')

@section('title', 'Редактировать тип обучения')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="mt-4 mb-3">
		<h1 class="h1">Редактировать тип обучения</h1>
	</div>
	
	<form action="{{ route('admin.trainings.update', $training->id) }}" method="post" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="form-group row">
			<label for="title" class="col-sm-2 col-form-label">Название</label>
			<div class="col-sm-10">
				<input type="text" name="title" class="form-control" id="title" placeholder="Название" required  value="{{ $training->title }}">
			</div>
		</div>
		@isset( $training->text )
			<div class="form-group row">
				<label for="text" class="col-sm-2 col-form-label">Название</label>
				<div class="col-sm-10">
					<textarea name="text" class="form-control" id="text" required style="min-height: 300px">{{ $training->text }}</textarea>
				</div>
			</div>
		@endisset
		@isset( $training->link )
			<div class="form-group row">
				<label for="link" class="col-sm-2 col-form-label">Ссылка</label>
				<div class="col-sm-10">
					<input type="text" name="link" class="form-control" id="link" placeholder="label" required  value="{{ $training->link }}">
				</div>
			</div>
		@endisset
		<button class="btn btn-primary">Сохранить изменения</button>
	</form>
	
</main>

@endsection
