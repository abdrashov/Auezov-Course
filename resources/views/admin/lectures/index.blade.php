@extends('admin.layouts.app')

@section('title', 'Лекция')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-3">
		<h1 class="h1">Лекция</h1>

		<div class="btn-toolbar mb-2 mb-md-0">
			<form action="{{ route('admin.lectures.create') }}" method="get">
				<input type="hidden" name="id" value="{{ $course->id }}">
				<button class="btn btn-sm btn-outline-success">Добавить лекцию</button>
			</form>
		</div>

	</div>

   <div class="table-responsive">
     	<table class="table table-striped table-sm">
       	<thead>
         	<tr>
					<th>#</th>
					<th>Файл</th>
					<th>Действие</th>
         	</tr>
    		</thead>
		 	<tbody>
		 		@foreach($course->lectures as $lecture)
			   	<tr>
						<th>{{ $lecture->index }}</th>
						<td>
							<a href="{{ Storage::url($lecture->file) }}" target="_blank">{{ $lecture->file }}</a>
						</td>
						<td>
							<!-- Modal Delete -->
							<button type="button" class="my-1 badge btn btn-danger " data-toggle="modal" data-target="#delete{{ $lecture->id }}">Удалить</button>
						</td>
			      </tr>
					<!-- Modal Delete -->
					<div class="modal fade" id="delete{{ $lecture->id }}" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="w-100" style="pointer-events: auto">
								<form action="{{ route('admin.lectures.destroy', $lecture->id ) }}" method="post">
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
