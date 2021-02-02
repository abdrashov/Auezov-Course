
<a href="{{ route('course',$course->id) }}" class="card link-hover">

	<img src="{{ Storage::url($course->image) }}" class="card-img-top" alt="{{ $course->title }}">
	

	<div class="card-body text-dark">
		<h5 class="mb-1 card-title">
			{{ $course->title }}
		</h5>	
		<p class="mb-0 card-text">{{ $course->category->localTitle() }}</p>
		<p class="card-text text-right">
			<small>{{ $course->dateStart() }} &ndash; {{ $course->dateEnd() }}</small>
		</p>
	</div>
</a>