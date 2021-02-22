@extends('layouts.app')

@section('title', __('app.module').': '.$course->title." – " )

@section('content')
<div class="container my-4">

	{{ Breadcrumbs::render('module', $course) }}
    @include('messages.error_success')

	<div class="bg-white p-4 shadow-sm training-header rounded overflow-hidden">
		
	<p class="h2">{{ $course->title }}</p>
	
<div class="table-responsive">
	<table class="table table-bordered table-sm">
		<tbody>
		   @foreach($course->modules as $module)
				<tr>
					<td colspan="5" class="py-3">
						<b>{{ __('app.module') }} #{{ $module->index }}</b>: 
						{{$module->title }}
					</td>
				</tr>
	       	@foreach($module->lessons as $lesson)
           	<tr>
             	<td width="46"></td>
             	<td colspan="2" class="align-middle">
           			<b>{{ __('app.lecture') }} #{{ $lesson->index}}</b>: 
             		{{$lesson->title }}
             	</td>
             	<td colspan="2" style="max-width: 120px" class="align-middle"><!-- Button trigger modal -->
								<button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#lesson{{ $lesson->id }}">
							  	{{ __('app.rating') }}
								</button>
								<!-- Modal -->
								<div class="modal fade" id="lesson{{ $lesson->id }}" tabindex="-1" role="dialog" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title">{{ __('app.lecture').': '.$lesson->title }}</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
												<table class="table table-striped table-sm">
										     	<tr>
														<th>#</th>
														<th>{{ __('app.lecture') }} <small>(max 60)</small></th>	
														<th>{{ __('app.test') }} <small>(max 40)</small></th>      
														<th>{{ __('app.final.control') }} <small>(max 100)</small></th> 
													</tr>
											   	<tr>
														<th>1</th>
														<td width="160">
															<input type="number" name="balls[]" class="form-control" min="0" max="100" required value="{{ $lesson->users->find(Auth::id())->pivot_ball()  ?? '' }}" disabled="">
														</td>
														<td width="160">
															<input type="text" name="balls[]" class="form-control" min="0" max="100" required value="{{ $lesson->users->find(Auth::id())->pivot_test() ?? '' }}" disabled="">
														</td>
														<td>
															<span class="btn font-weight-bold">
																{{ $lesson->users->find(Auth::id())->pivot_test() 
																	? $lesson->users->find(Auth::id())->pivot_ball() + $lesson->users->find(Auth::id())->pivot_test() 
																	: '' }}
															</span>
														</td>
													</tr>
												</table>	
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('app.close') }}</button>
								      </div>
								    </div>
								  </div>
								</div>
							</td>
	         </tr>
		           @foreach($lesson->trainings as $training)
		              <tr>
		               	<td></td>
		               	<td width="46"></td>
										<td class="align-middle" colspan="2">
											<a href="{{ $training->isTest() ? route('test', [$course->id, $lesson, $training]) : route('training', [$course->id, $training]) }}" class="btn btn-light btn-block bg-mint text-left" data-tooltip="tooltip" data-placement="left" title="{{ __('app.open') }}">
												{{ $training->title }}
											</a>
										</td>
										<td width="35" class="text-success h4">
											@if( $training->users->contains(Auth::id()))
												<i class="bi bi-check2-circle"></i>
											@endif
										</td>
		              </tr>
		           @endforeach
		       @endforeach
		   @endforeach
		</tbody>
	</table>
</div>

	</div>
</div>

@endsection
