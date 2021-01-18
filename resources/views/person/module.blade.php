@extends('layouts.app')

@section('title', 'Модуль: '.$course->title )

@section('content')
<div class="container my-4">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb bg-white shadow-sm">
   		<li class="breadcrumb-item">
   			<a href="{{ route('course',$course->id) }}">
   				{{ __('app.course') }}
   			</a>
   		</li>
	   	<li class="breadcrumb-item active">
	   		{{ __('app.module') }}: {{ $course->title }}
	   	</li>
		</ol>
	</nav>

	<div class="bg-white p-4 shadow-sm training-header rounded overflow-hidden">
		
		<p class="h2">{{ $course->title }}</p>
	
<div class="table-responsive">
	<table class="table table-bordered table-sm">
		<tbody>
		   @foreach($course->modules as $module)
				<tr>
					<td colspan="4" class="py-3">
						<b>{{ __('app.module') }} #{{ $module->index }}</b>: 
						{{$module->title }}
					</td>
				</tr>
		       @foreach($module->lessons as $lesson)
		           <tr>
		               <td width="46"></td>
		               <td colspan="3">
		               	<b>{{ __('app.lecture') }} #{{ $lesson->index}}</b>: 
		               	{{$lesson->title }}
		               </td>
		           </tr>
		           @foreach($lesson->trainings as $training)
		               <tr>
		               	<td></td>
		               	<td width="46"></td>
								<td class="align-middle">
									@if( $training->isTest() )
										<form action="{{ route('test', [$course, $training]) }}" method="get">
									@else
										<form action="{{ route('training', [$course, $training]) }}" method="get">
									@endif
										<button class="btn btn-light btn-block bg-mint text-left"data-tooltip="tooltip" data-placement="left" title="{{ __('app.open') }}">
											{{ $training->title }}
										</button >
									</form>
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
