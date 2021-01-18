@extends('admin.layouts.app')

@section('title', 'Категории')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-3">
		<h1 class="h1">Категории</h1>

		{{-- 		
			<div class="btn-toolbar mb-2 mb-md-0">
				<a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-success">Создать категорию</a>

			</div> 
		--}}

	</div>

   <div class="table-responsive">
     	<table class="table table-striped table-sm">
       	<thead>
         	<tr>
					<th>#</th>
					<th>Название</th>
					<th>Действие</th>
         	</tr>
    		</thead>
		 	<tbody>
		 		@foreach($categories as $category)
			   	<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->title }}</td>
						<td>	
							<!-- Modal Delete -->
							<button type="button" class="my-1 badge btn btn-sm btn-danger " data-toggle="modal" data-target="#delete{{ $category->id }}">Удалить</button>
						</td>
			      </tr>
					<!-- Modal Delete -->
					<div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="w-100" style="pointer-events: auto">
								<form action="{{ route('admin.categories.destroy', $category->id ) }}" method="post">
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
