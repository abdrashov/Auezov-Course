<div class="card">
 	<div class="card-header" id="heading{{ $module->id }}">
   	<div>
     		<button class="btn btn-link text-dark btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $module->id }}" aria-expanded="false" aria-controls="collapseOne">
     			@include('icon.down_1_6em')
				<b>{{ __('app.module') }} #{{ $loop->iteration.": ".$module->title }}</b>
  			</button>
   	</div>
 	</div>
	<div id="collapse{{ $module->id }}" class="collapse" aria-labelledby="heading{{ $module->id }}" data-parent="#module">
		<div class="card-body">	
			@empty(  $module->lessons->first() )
				<div class="alert alert-info">
					<span>Уроки не найдены</span>
				</div>
			@else
				<div class="accordion" id="lesson{{ $module->id }}">
					@foreach( $module->lessons as $lesson  )
						<div class="card">
					    	<div class="card-header" id="heading{{ $module->id.$lesson->id }}">
					      	<div>
					        		<button class="btn btn-link text-dark btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#module{{ $module->id.$lesson->id }}" aria-expanded="false" aria-controls="module{{ $module->id.$lesson->id }}">
			        					@include('icon.down_1_6em')
					          		<b>{{ __('app.lecture') }} #{{ $lesson_index++.": ".$lesson->title }}</b>
					     			</button>
					      	</div>
					    	</div>
							<div id="module{{ $module->id.$lesson->id }}" class="collapse" aria-labelledby="heading{{ $module->id.$lesson->id }}" data-parent="#lesson{{ $module->id }}">
								<div class="card-body">
			     					<span>Все уроки по модулю</span> 
						     		@empty( $lesson->videoLesua->first() )
										<div class="alert alert-info">
											<span>Уроки не найдены</span>
										</div>
						     		@else
										{{--  $index для нумерации уроков --}}
							     		@php $index = 1; @endphp
										@foreach( $lesson->videoLesua  as $videoLesua  )
								     		<a class="btn btn-block btn-light text-left border" href="
								     		{{ route('training',[
													$lesson->id,
													$videoLesua->id
		                        	])}}">
		        {{--  $index для нумерации уроков --}}
               @if( isset($videoLesua->link) )
                   {{ __('app.lesson') }} #{{ $index++.": ".$videoLesua->title }}
               @elseif( isset($videoLesua->text) )
                   {{ __('app.lesson') }} #{{ $index++.": ".$videoLesua->title }}
               @else
                   {{ __('app.test') }}: {{ $videoLesua->title }}
               @endif
               						</a>
								     	@endforeach
			  					 	@endempty
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endempty
		</div>
	</div>
</div>