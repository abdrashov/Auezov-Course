@extends('admin.layouts.app')

@section('title', 'Тесты')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-3">
		<h1 class="h1">Тесты</h1>

		<div class="btn-toolbar mb-2 mb-md-0">
			<form action="{{ route('admin.tests.create') }}" method="get">
				<input type="hidden" name="id" value="{{ $training->id }}">
				<button class="btn btn-sm btn-outline-success">Добавить тест</button>
			</form>
		</div>

	</div>

   <div class="table-responsive">
     	<table class="table table-striped table-sm">
       	<thead>
         	<tr>
					<th>#</th>
					<th>Вопрос</th>
					<th>Правильный</th>
					<th>Неправильный</th>
					<th>Неправильный</th>
					<th>Неправильный</th>
					<th>Действие</th>
         	</tr>
    		</thead>
		 	<tbody>
		 		@foreach($training->testQuestions as $testQuestion)
			   	<tr>
						<th>{{ $loop->iteration }}</th>
						<td width="300">{{ $testQuestion->title }}</td>
		 				@foreach($testQuestion->answers as $answer)
							<td>{{ $answer->title }}</td>
						@endforeach
						<td>
							<a href="{{ route('admin.tests.edit', $testQuestion->id) }}" class="my-1 badge btn btn-warning">Редактировать</a><br>
							<!-- Modal Delete -->
							<button type="button" class="my-1 badge btn btn-danger " data-toggle="modal" data-target="#delete{{ $testQuestion->id }}">Удалить</button>
						</td>
			      </tr>
					<!-- Modal Delete -->
					<div class="modal fade" id="delete{{ $testQuestion->id }}" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="w-100" style="pointer-events: auto">
								<form action="{{ route('admin.tests.destroy', $testQuestion ) }}" method="post">
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
