@extends('admin.layouts.app')

@section('title', 'Подписчики')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

	<div class="alert alert-danger">
		<b>!!!</b> Стадия разработки
	</div>

  <div class="mt-4 mb-3">
		<h1>Подписчики</h1>
		<p>Курс: <span class="h5">{{ $course->title }}</span></p>
	</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
       	<tr>
					<th>#</th>
					<th>Ф.И</th>
					<th>Почта</th>
					<th>Время под-ки</th>
       	</tr>
  		</thead>
	 		<tbody>
		 		@foreach($course->users as $user)
			   	<tr>
						<th>{{ $loop->iteration }}</th>
						<td>{{ $user->surname.' '.$user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->pivot->created_at->format('H:i d/i/Y') }}</td>
	      @endforeach
		 	</tbody>
		</table>
	</div>
</main>

@endsection
