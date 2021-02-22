@extends('admin.layouts.app')

@section('title', 'Оценки')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  <div class="mt-4 mb-3">
		<h1>Оценки</h1>
		<p>Лекция: <span class="h5">{{ $lesson->title }}</span></p>
	</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
       	<tr>
					<th>#</th>
					<th>Ф.И</th>
					<th>Оценки за лекцию <small>(max 60)</small></th>	
					<th>Тест <small>(max 40)</small></th>      
					<th>Итоговый контроль</th>       	
				</tr>
  		</thead>
	 		<tbody>
			 		@foreach($lesson->users as $user)
				   	<tr>
							<th>{{ $loop->iteration }}</th>
							<td>{{ $user->surname.' '.$user->name }}</td>
							<td width="190">
								<input type="number" name="balls[]" class="form-control" min="0" max="100" required value="{{ $user->pivot_ball() }}" disabled="">
							</td>
							<td width="160">
								<input type="text" name="balls[]" class="form-control" min="0" max="100" required value="{{ $user->pivot_test() }}" disabled="">
							</td>
							<td>
								<span class="btn font-weight-bold">
									@if( is_string($user->pivot_test()) )
										{{ $user->pivot_test() }}
									@else
										{{ $user->pivot_test() ? $user->pivot_ball() + $user->pivot_test() : '' }}
									@endif
								</span>
							</td>
						</tr>
		      @endforeach
		 	</tbody>
		</table>
	</div>

</main>

@endsection
