@extends('layouts.app')

@section('title', __('app.search.courses')." – " )

@section('content')
<div class="bg-white">
	<section class="py-5 text-center bg-gardient-mint">
		<div class="container">
			<h1 class="text-center text-white">{{ __('app.search.courses') }}</h1>
			<form action="{{ route('search') }}" method="get" class="w-100 mx-auto">
				<div class="input-group input-group-lg  mb-3">

				  <input name="search" type="text" class="form-control border border-white w-75" placeholder="{{ __('app.what.are.you') }}" value="{{ request()->input('search') }}">

				  <div class="input-group-append">
						<button class="btn btn-light" id="button-addon2">
							<i class="bi bi-search"></i>
						</button>
				  </div>
				</div>
{{-- 
				<fieldset disabled>
					<div class="row">
						<div class="col-12 col-md-9 pr-md-0 mb-md-0 mb-2 ">
							<div class="input-group-lg">
								<select class="custom-select" name="id">
								  <option value="0">Направление</option>
									@foreach($categories as $category)
								  		<option value="{{ $category->id }}" @if(request()->input('id') == $category->id) selected @endif>{{ $category->title }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-12 col-md-3 mb-md-0 mb-2 ">
							<div class="input-group-lg" readonly>
								<select class="custom-select" name="lang">
									<option value="0">{{ __('app.lang') }}</option>
									<option value="ru">Русский</option>
									<option value="kk">Казахский</option>
									<option value="en">Английский</option>
								</select>
							</div>
						</div>
					</div>
				</fieldset> --}}
			</form>
		</div><br><br>
	</section>
</div>
<div class="container">
	<br><br>
	<div class="d-flex" style="justify-content: center;">
		<p class="h2 text-bottom pb-3 mb-4 text-uppercase">
			@empty( request()->input('search') )
				{{ __('app.courses') }}
			@else
				{{ __('app.search.results') }}
			@endempty
		</p>
	</div>
	@empty($courses->first())
		<div class="alert alert-info lead">
			<span>
				{{ __('app.the.course.was') }}. 
			</span>
			<a href="{{ route('search') }}" class="text-link">
				{{ __('app.courses') }}
			</a>
		</div>
	@else
		<div class="card-columns lessons">
			@foreach($courses as $course)
				@include('include.card')
			@endforeach
		</div>
	@endempty
</div><br><br><br><br>
@endsection
