@extends('admin.layouts.app')

@section('title', 'Виды уроков')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="mt-4 mb-2 row">
		<h1 class="h1 col-12">Виды уроков</h1>

		<div class="col-12 col-md-3 mb-2">
			<button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#createVideo">Добавить видеоурок</button>
		</div>
		<div class="col-12 col-md-6 mb-2">
			<button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#createLab">Добавить лабораторию или лекцию</button>
		</div>
		<div class="col-12 col-md-3 mb-2">
			<button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#createTest">Добавить тест</button>
		</div>

	</div>

   <div class="table-responsive">
     	<table class="table table-striped table-sm">
       	<thead>
         	<tr>
					<th>#</th>
					<th>Название</th>
					<th>Контент</th>
					<th>Действие</th>
         	</tr>
    		</thead>
		 	<tbody>
		 		@foreach($lesson->trainings as $training)
			   	<tr>
						<th>{{ $loop->iteration }}</th>
						<th>{{ $training->title }}</th>
						<td>
							<div style="height: 120px; overflow: hidden;">
								@empty( $training->contentAdmin() )
									<a href="{{ route('admin.tests.show', $training->id) }}" class="btn btn-sm btn-info">Вопросы: {{ $training->testQuestions()->count() }}</a>
								@else
									{!! $training->contentAdmin() !!}
								@endempty
							</div>
						</td>
						<td>
							@empty( $training->contentAdmin() )
								<a href="{{ route('admin.tests.show', $training->id) }}" class="btn badge btn-info">Добавить вопросы</a>
							@endempty
							<a href="{{ route('admin.trainings.edit', $training->id) }}" class="my-1 badge btn btn-warning">Редактировать</a><br>
							<!-- Modal Delete -->
							<button type="button" class="my-1 badge btn btn-danger " data-toggle="modal" data-target="#delete{{ $training->id }}">Удалить</button>
						</td>
			      </tr>
					<!-- Modal Delete -->
					<div class="modal fade" id="delete{{ $training->id }}" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="w-100" style="pointer-events: auto">
								<form action="{{ route('admin.trainings.destroy', $training->id ) }}" method="post">
									@csrf
									@method('DELETE')
									<button class="my-1 btn w-100 btn-danger " data-toggle="modal" data-target="#update">Удалить безвозвратно</button>
								</form>
							</div>
						</div>
					</div>
		      @endforeach
		 	</tbody>
		</table>
	</div>
</main>
{{-- modal viedo --}}
<div class="modal fade" id="createVideo" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Видеоурок</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				 	<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
	         <form action="{{ route('admin.trainings.store') }}" method="post">
	            @csrf
	            <input name="lesson_id" type="hidden" value="{{$lesson->id}}">
             	<div class="form-group">
                 	<label>Название урока</label>
                 	<input name="title" type="text" class="form-control" value="Видеоурок" placeholder="Название" required>
             	</div>
             	<div class="form-group">
                 	<label>Ссылка на видео YouTube</label>
                 	<input name="link" type="text" class="form-control" placeholder="Ссылка" required value="{{ old('link') }}">
          		</div><br>
             	<button class="btn btn-sm btn-primary">Добавить видеоурок</button>
             	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Закрыть</button>
	        	</form>
			</div>
		</div>
	</div>
</div>
{{-- end modal viedo --}}
{{-- modal lab --}}
<div class="modal fade" id="createLab" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Лекция</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				 	<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
	         <form action="{{ route('admin.trainings.store') }}" method="post">
	            @csrf
	            <input name="lesson_id" type="hidden" value="{{$lesson->id}}">
             	<div class="form-group">
                 	<label>Название</label>
                 	<input name="title" type="text" class="form-control" value="Лекция" required>
             	</div>
             	<div class="form-group">
                 	<label>Теория</label>
                 	<textarea name="text" class="form-control" rows="3" placeholder="" style="min-height: 300px;" required>{{ old('text') }}</textarea>
             	</div>
             	<button class="btn btn-sm btn-primary">Добавить лекцию</button>
             	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Закрыть</button>
	        	</form>
			</div>
		</div>
	</div>
</div>
{{-- end modal lab --}}
{{-- modal test --}}
<div class="modal fade" id="createTest" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h4 class="modal-title">Тест</h4>
			   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			       <span aria-hidden="true">&times;</span>
			   </button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin.trainings.store') }}" method="post">
					<label class="alert-info rounded p-2"><b>Важно:</b> Просто нажмите на кнопку "Добавить", после нажатия внизу появляется блок "Добавить вопросы", там вы должны добавить вопросы только что созданному тесту!</label>
				 	@csrf
					<input name="lesson_id" type="hidden" value="{{$lesson->id}}">
             	<div class="form-group">
                 	<label for="titleTest">Название</label>
                 	<input name="title" type="text" class="form-control" value="Тестовые задания" required>
             	</div>
					<button class="btn btn-sm btn-primary">Добавить</button>
             	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Закрыть</button>
				</form>
			</div>
		</div>
   </div>
</div>
{{-- end modal test --}}
@endsection
