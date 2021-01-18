@extends('layouts.app')

@section('title', __('app.welcome') )

@section('content')
@include('messages.error_success')
<section class="py-5 text-center bg-gardient-mint">
    <div class="container">
		<h1 class="font-weight-bold text-white">{{ __('app.courses.form.lead') }}</h1>
		<p class="lead text-light">{{ __('app.south.kazakhstan') }}</p>
		<a href="{{ route('search') }}" class="btn btn-outline-light my-2">&mdash; {{ __('app.courses') }} &mdash;</a>
    </div>
</section>
<div class="bg-white">
	<br>
	<div class="container mt-5">
		<div class="d-flex" style="justify-content: center;">
			<p class="h2 text-bottom pb-3 mb-4 text-uppercase text-center">
				{{ __('app.advantages') }}
			</p>
		</div>
		<div class="row">
			<div class="col-12 col-sm-6 col-md-3 text-center mb-3">
				<div class="mb-2" style="font-size: 3.5em;">
	         	<img src="{{ asset('image/many.png') }}" alt="">
				</div>
				<p class="h3 font-weight-bold">
					{{ __('app.mass.character') }}
				</p>
				<span>
					{{ __('app.hundereds.and') }}
				</span>
			</div>
			<div class="col-12 col-sm-6 col-md-3 text-center mb-3">
				<div class="mb-2" style="font-size: 3.5em;">
	         	<img src="{{ asset('image/open.png') }}" alt="">
				</div>
				<p class="h3 font-weight-bold">
					{{ __('app.opennes') }}
				</p>
				<span>
					{{ __('app.all.courses.are') }}
				</span>
			</div>
			<div class="col-12 col-sm-6 col-md-3 text-center mb-3">
				<div class="mb-2" style="font-size: 3.5em;">
	         	<img src="{{ asset('image/online.png') }}" alt="">
				</div>
				<p class="h3 font-weight-bold">
					{{ __('app.online') }}
				</p>
				<span>
					{{ __('app.independencs') }}
				</span>
			</div>
			<div class="col-12 col-sm-6 col-md-3 text-center mb-3">
				<div class="mb-2" style="font-size: 3.5em;">
	         	<img src="{{ asset('image/comfort.png') }}" alt="">
				</div>
				<p class="h3 font-weight-bold">
					{{ __('app.comfortability') }}
				</p>
				<span>
					{{ __('app.everyone.chooses') }}
				</span>
			</div>
		</div>
	</div><br><br>
</div>

<div class="container mt-5" id="video"><br>
	<div class="d-flex" style="justify-content: center;">
		<p class="h1 text-bottom pb-3 mb-4 text-uppercase">
			{{ __('app.courses') }}
		</p>
	</div>
	<div class="card-columns lessons">
		@foreach($courses as $course)
			@include('include.card')
		@endforeach
	</div>
	<div class="text-center mt-4">
		<a href="{{ route('search') }}" class="btn btn-light btn-lg w-50 bg-mint">
			{{ __('app.courses') }}
		</a>
	</div>
</div><br><br><br><br>
@endsection
