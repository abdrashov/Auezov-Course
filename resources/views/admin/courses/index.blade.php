@extends('admin.layouts.app')

@section('title', 'Курсы')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-3">
		<h1 class="h1">Курсы</h1>

		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="{{ route('admin.courses.create') }}" class="btn btn-sm btn-outline-success">Добавить курс</a>
		</div>

	</div>

   <div class="table-responsive">
     	<table class="table table-striped table-sm">
       	<thead>
         	<tr>
					<th>#</th>
					<th colspan="2">Название</th>
					<th>Статус</th>
					<th>Язык</th>
					<th>Начало</th>
					<th>Конец</th>
					<th>Обучение</th>
					<th>Действие</th>
         	</tr>
    		</thead>
		 	<tbody>
		 		@foreach($courses as $course)
			   	<tr>
						<th>{{ $course->id }}</th>
						<td width="80">
							<img src="{{ Storage::url($course->image) }}" alt="" width="70">
						</td>
						<td>{{ $course->title }}</td>
						<td>{{ $course->isStatus() }}</td>
						<td>{{ $course->lang }}</td>
						<td>{{ $course->dateStart() }}</td>
						<td>{{ $course->dateEnd() }}</td>
						<td>
							<a href="{{ route('admin.modules.show', $course->id) }}" class="my-1 badge btn btn-success">
								Модуль: {{ $course->modules->count() }}
							</a>
							<br>
							<a href="{{ route('admin.lectures.show', $course->id) }}" class="my-1 badge btn btn-success">
								Лекция: {{ $course->lectures->count() }}
							</a>
							<br>
						</td>
						<td>	
							<a href="{{ route('admin.courses.show', $course->id) }}" class="my-1 badge btn btn-info">Показать</a><br>
							<a href="{{ route('admin.courses.edit', $course->id) }}" class="my-1 badge btn btn-warning">Редактировать</a><br>
							<!-- Modal Delete -->
							<button type="button" class="my-1 badge btn btn-danger " data-toggle="modal" data-target="#delete{{ $course->id }}">Удалить</button>
						</td>
			      </tr>
					<!-- Modal Delete -->
					<div class="modal fade" id="delete{{ $course->id }}" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="w-100" style="pointer-events: auto">
								<form action="{{ route('admin.courses.destroy', $course->id ) }}" method="post">
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
