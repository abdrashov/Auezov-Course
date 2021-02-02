@extends('admin.layouts.app')

@section('title', 'Пользователи')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
	<br>
	@include('messages.error_success')

  	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-3">
		<h1 class="h1">Пользователи</h1>

	</div>

   <div class="table-responsive">
     	<table class="table table-striped table-sm">
       	<thead>
         	<tr>
					<th>#</th>
					<th>Имя</th>
					<th>Фамилия</th>
					<th>Почта</th>
					<th>Права</th>
					<th>Дата регистрации</th>
         	</tr>
    		</thead>
		 	<tbody>
		 		@foreach($users as $user)
			   	<tr>
						<th>{{ $user->id }}</th>
						<td>{{ $user->name }}</td>
						<td>{{ $user->surname }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->isAdmin() }}</td>
						<td>{{ $user->created_at->format('H:i d.m.Y') }}</td>
			      </tr>
		      @endforeach
		 	</tbody>
		</table>
	</div>
</main>

@endsection
