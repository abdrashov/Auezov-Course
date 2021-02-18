@extends('admin.layouts.app')

@section('title', 'Курсы')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

	<div class="alert alert-danger">
		<b>!!!</b> Стадия разработки
	</div>

  <div class="mt-4 mb-3">
		<h1>Оценки</h1>
		<p>Курс: <span class="h5">{{ $course->title }}</span></p>
	</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
       	<tr>
					<th>#</th>
					<th>Название урока</th>
					<th>Почта</th>
       	</tr>
  		</thead>
	 		<tbody>
		 		@foreach($course->lessons as $lesson)
			   	<tr>
						<th>{{ $loop->iteration }}</th>
						<td>{{ $lesson->title }}</td>
						<td>
							{{ $lesson->title }}
						</td>
	      @endforeach
		 	</tbody>
		</table>
	</div>
</main>

@endsection
