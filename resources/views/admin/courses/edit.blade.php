@extends('admin.layouts.app')

@section('title', 'Редактировать курс')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="mt-4 mb-3">
		<h1 class="h1">Редактировать курс</h1>
	</div>
	
	<form action="{{ route('admin.courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="form-group row">
			<label for="title" class="col-sm-2 col-form-label">Название</label>
			<div class="col-sm-10">
				<input type="text" name="title" class="form-control" id="title" placeholder="Название" required  value="{{ $course->title }}">
			</div>
		</div>
		<div class="form-group row">
			<label for="category_id" class="col-sm-2 col-form-label">Категория</label>
			<div class="col-sm-10">
				<select class="form-control" id="category_id" name="category_id" required>
				    @foreach( $categories as $category )
				      <option value="{{ $category->id }}" @if($course->category_id == $category->id) selected @endif>
				      	{{ $category->title }}
				   	</option>
				   @endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="description" class="col-sm-2 col-form-label">О курсе</label>
			<div class="col-sm-10">
    			<textarea class="form-control" name="description" id="description" rows="3" placeholder="О курсе">{{ $course->description }}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="status" class="col-sm-2 col-form-label">Статус</label>
			<div class="col-sm-10">
				<select class="form-control" id="status" name="status" required>
					@if( $course->status == 1 )
				      <option value="1" selected>
				      	Курс видно
				   	</option>
				      <option value="0">
				      	Курс скрыть
				   	</option>
			   	@else
				      <option value="1">
				      	Курс видно
				   	</option>
				      <option value="0" selected>
				      	Курс скрыть
				   	</option>
			   	@endif
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="start" class="col-sm-2 col-form-label">Начало курса</label>
			<div class="col-sm-10">
				<input type="date" name="start" class="form-control" id="start" placeholder="Начало курса" required  value="{{ date('Y-m-d', strtotime($course->start)) }}">
			</div>
		</div>
		<div class="form-group row">
			<label for="end" class="col-sm-2 col-form-label">Конец курса</label>
			<div class="col-sm-10">
				<input type="date" name="end" class="form-control" id="end" placeholder="Конец курса" required  value="{{ date('Y-m-d', strtotime($course->end)) }}">
			</div>
		</div>
		<div class="form-group row">
			<label for="lang" class="col-sm-2 col-form-label">Язык</label>
			<div class="col-sm-10">
				<select class="form-control" id="lang" name="lang" required>
				   @foreach(['kk', 'ru', 'en'] as $lang )
				      <option value="{{ $lang }}" @if($course->lang == $lang) selected @endif>
				      	{{ $lang }}
				   	</option>
				   @endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="image" class="col-sm-2 col-form-label">Картинка</label>
			<div class="col-sm-10">
				<input type="file" name="image" class="form-control" id="image">
			</div>
		</div>
		<button class="btn btn-primary">Сохранить изменения</button>
	</form>
	
</main>

@endsection
