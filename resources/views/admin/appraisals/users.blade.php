@extends('admin.layouts.app')

@section('title', 'Курсы')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  <div class="mt-4 mb-3">
		<h1>Оценки</h1>
		<p>Лекция: <span class="h5">{{ $lesson->title }}</span></p>
	</div>

	<form action="{{ route('admin.appraisal.lessons.update', $lesson->id) }}" method="POST">
		@csrf
		@method('PUT')
	  <div class="table-responsive">
	    <table class="table table-striped table-sm">
	      <thead>
	       	<tr>
						<th>#</th>
						<th>Ф.И</th>
						<th>Оценки за лекцию<small> min(0) - max(100)</small></th>	
						<th></th>       	
					</tr>
	  		</thead>
		 		<tbody>
				 		@foreach($lesson->users as $user)
					   	<tr>
								<th>{{ $loop->iteration }}</th>
								<td>{{ $user->surname.' '.$user->name }}</td>
								<td width="240">
									<input type="number" name="balls[]" class="form-control" min="0" max="100" required value="{{ $user->pivot->ball }}">
									<input type="hidden" name="users[]" class="form-control" required value="{{ $user->id }}">
								</td>
								<td></td>
							</tr>
			      @endforeach
			 	</tbody>
			</table>
		</div>
		<button class="btn btn-primary">Сохранить</button>
	</form>
</main>

@endsection
