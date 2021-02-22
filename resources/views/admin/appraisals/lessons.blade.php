@extends('admin.layouts.app')

@section('title', 'Лекции')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  <div class="mt-4 mb-3">
		<h1>Лекции</h1>
		<p>Курс: <span class="h5">{{ $course->title }}</span></p>
	</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
       	<tr>
					<th>#</th>
					<th>Название лекции</th>
					<th>Оценки за лекцию</th>
					<th>Оценки</th>
       	</tr>
  		</thead>
	 		<tbody>
		 		@foreach($course->lessons()->orderBy('index')->get() as $lesson)
			   	<tr>
						<th>{{ $lesson->index }}</th>
						<td>{{ $lesson->title }}</td>
						<td>
							<a href="{{ route('admin.appraisal.lessons.ball', $lesson->id) }}" class="btn btn-sm btn-link text-primary">
								Поставить
							</a>
						</td>
						<td>
							<a href="{{ route('admin.appraisal.ball', $lesson->id) }}" class="btn btn-sm btn-link text-primary">
								Посмотреть
							</a>
						</td>
	      @endforeach
		 	</tbody>
		</table>
	</div>
</main>

@endsection
