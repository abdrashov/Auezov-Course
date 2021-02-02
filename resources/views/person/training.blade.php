@extends('layouts.app')

@section('title', $training->title." – " )

@section('content')
<div class="container my-4">

	{{ Breadcrumbs::render('training', $training) }}

	<div class="bg-white px-3 py-4 shadow-sm training-header rounded overflow-hidden">
		<p class="h2">{{ $training->title }}</p>
		{!! $training->contentAdmin() !!}
	</div>
	
</div>
@endsection



