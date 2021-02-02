@extends('admin.layouts.app')

@section('title', 'Лекция')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-3">
		<h1 class="h1">Лекция</h1>

		<div class="btn-toolbar mb-2 mb-md-0">
			<form action="{{ route('admin.lessons.create') }}" method="get">
				<input type="hidden" name="id" value="{{ $module->id }}">
				<button class="btn btn-sm btn-outline-success">Добавить лекцию</button>
			</form>
		</div>

	</div>

   <div class="table-responsive">
     	<table class="table table-striped table-sm">
       	<thead>
         	<tr>
					<th>#</th>
					<th>Название</th>
					<th>Обучение</th>
					<th>Действие</th>
         	</tr>
    		</thead>
		 	<tbody>
		 		@foreach($module->lessons as $lesson)
			   	<tr>
						<th>{{ $lesson->index }}</th>
						<td>{{ $lesson->title }}</td>
						<td>
							<a href="{{ route('admin.trainings.show', $lesson->id) }}" class="my-1 badge btn btn-success px-2 font-weight-normal text-left">
								<p class="mb-1">
									Виды:
								</p>
								@foreach($lesson->trainings as $training)
									<p class="mb-1">
										{{ $loop->iteration.') '.$training->title }}
										@if( $training->isTest() )
											{{ ': '.$training->testQuestions->count() }}
										@endif
									</p>
								@endforeach
							</a>
						</td>
						<td>
							<a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="my-1 badge btn btn-warning">Редактировать</a><br>
							<!-- Modal Delete -->
							<button type="button" class="my-1 badge btn btn-danger " data-toggle="modal" data-target="#delete{{ $lesson->id }}">Удалить</button>
						</td>
			      </tr>
					<!-- Modal Delete -->
					<div class="modal fade" id="delete{{ $lesson->id }}" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="w-100" style="pointer-events: auto">
								<form action="{{ route('admin.lessons.destroy', $lesson->id ) }}" method="post">
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

@endsection
