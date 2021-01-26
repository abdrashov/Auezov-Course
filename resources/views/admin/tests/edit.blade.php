@extends('admin.layouts.app')

@section('title', 'Редактировать тест')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="mt-4 mb-3">
		<h1 class="h1">Редактировать тест</h1>
	</div>
	<form action="{{ route('admin.tests.update', $testQuestion->id ) }}" method="post">
		@csrf
		@method('PUT')
		<div class="mb-1">
			<label class="col-form-label">Вопрос</label>
			<textarea name="question" class="form-control" placeholder="Вопрос" required>{{ $testQuestion->title }}</textarea>
		</div>
		@foreach($testQuestion->adminAnswers as $answer)
			@if( $answer->isBall() )
				<div class="mb-1">
					<label class="col-form-label">Правильный ответ</label>
					<input type="text" name="answers[]" class="form-control"placeholder="Правильный ответ" required  value="{{ $answer->title }}">
				</div>
			@else
				<div class="mb-1">
					<label class="col-form-label">Неправильный ответ</label>
					<input type="text" name="answers[]" class="form-control"placeholder="Неправильный ответ" required  value="{{ $answer->title }}">
				</div>
			@endif
		@endforeach
		<div class="text-left">
			<button class="btn btn-primary">Сохранить изменения</button>
		</div>
	</form>
</main>
@endsection
