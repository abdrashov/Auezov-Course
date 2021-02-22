@extends('admin.layouts.app')

@section('title', 'Курсы')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  <div class="mt-4 mb-3">
		<h1 class="h1">Оценки</h1>
	</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
       	<tr>
					<th>#</th>
					<th colspan="2">Название</th>
					<th>Записались</th>
					<th colspan="2">Оценки</th>
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
						<td>
							<a href="{{ route('admin.appraisal.followers', $course->id) }}" class="btn btn-sm btn-link text-dark" data-tooltip="tooltip" data-placement="left" title="Открыть">
								{{ $course->users()->count() }}
							</a>
						</td>
						<td>
							<a href="{{ route('admin.appraisal.lessons.show', $course->id) }}" class="btn btn-sm btn-link text-primary">
								Открыть
							</a>
						</td>
	      @endforeach
		 	</tbody>
		</table>
	</div>
</main>

@endsection
