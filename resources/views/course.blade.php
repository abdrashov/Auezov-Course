@extends('layouts.app')

@section('title', $course->title)

@section('content')
@include('messages.error_success')
<section class="py-5 text-center bg-gardient-mint">
    <div class="container">
        <div class="row text-white">
            <div class="col-12 col-md-8 overflow-hidden">
                <p class="h2">{{ $course->title }}</p>
                <p class="lead">{{ $course->category->localTitle() }}</p>
                @if( $course->activeUser() )
                    <button class="btn btn-lg btn-light active mt-1" role="button" aria-pressed="true">
                        {{ __('app.you.are.enroll') }}
                    </button>
                    <a href="{{ route('module', $course->id) }}" class="btn btn-lg btn-light mt-1">
                        {{ __('app.start.course') }}
                    </a>
                @else
                    <form action="{{ route('signCourse', $course->id) }}" method="post">
                        @csrf
                        <button class="btn btn-lg btn-light">
                            {{ __('app.sign.up.for') }}
                        </button>
                    </form>
                @endif
                <hr>
            </div>
            <div class="col-12 col-md-4 mt-3 mt-lg-0 ">
                <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" width="260">
            </div>
        </div>
    </div>
</section>
<br>
<br>
<div class="container mb-4">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="bg-white px-3 py-4 shadow-sm training-header rounded overflow-hidden">
                <p class="h2">
                    {{ __('app.about.course') }}
                </p>
                <p>
                    {!! $course->getTextFilt() !!}
                </p>
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-4 mt-lg-0">
            <div class="bg-white p-4 shadow-sm training-header rounded overflow-hidden">
                <div class="mb-2">
                    <p class="h5 font-weight-bold">
                        {{ __('app.course.start') }}
                    </p>
                    <p class="ml-4">
                        {{ $course->dateStart() }}
                    </p>
                </div>
                <div class="mb-4">
                    <p class="h5 font-weight-bold">
                        {{ __('app.end.of.course') }}
                    </p>
                    <p class="ml-4">
                        {{ $course->dateEnd() }}
                    </p>
                </div>

                @auth
                <div class="mb-4">
                    <p class="h5 font-weight-bold">
                        {{ __('app.additional.materials') }}
                    </p>
                    @foreach( $course->lectures as $lecture )
                        <a href="{{ Storage::url($lecture->file) }}" class="btn btn-block btn-info" target="_bland">
                            {{ __('app.lecture') }} #{{ $lecture->index }}
                        </a>
                    @endforeach
                </div>
                @endauth

            </div>
        </div>
    </div>
</div>
@endsection



