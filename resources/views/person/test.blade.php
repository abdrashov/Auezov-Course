@extends('layouts.app')

@section('title', $training->title )

@section('content')
<div class="container my-4">
    <div class="bg-white px-3 py-4 shadow-sm training-header rounded overflow-hidden"> 
        <p class="h2">
            {{ $training->title }}
        </p>
        <div class="table-responsive">
@foreach($training->testQuestions as $question)
    @if( $question->testResult()->exists() )
    <p class="lead my-1" >
        {!! $loop->iteration.'. '.$question->getTitleFilt() !!}
    </p>
    <table class="table table-sm rounded overflow-hidden border mb-3">
        <tbody>
            @foreach($question->answers as $answer)
                @if( $answer->testResult()->exists() && 
                $answer->testResult->first()->test_answer_id === $answer->id )
                    @if( $answer->ball > 0 )
                        <tr>
                            <td scope="row" class="table-success">
                                <div class="custom-control custom-radio">
                                    <input name="answer{{$answer->id}}" class="custom-control-input" type="radio" checked disabled>
                                    <label class="custom-control-label w-100 font-weight-bold">
                                        {{ $answer->title }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td scope="row" class="table-danger">
                                <div class="custom-control custom-radio">
                                    <input name="answer{{$answer->id}}}" class="custom-control-input" type="radio" checked disabled>
                                    <label class="custom-control-label w-100 font-weight-bold">
                                        {{ $answer->title }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @endif
                @else
                    @if( $answer->ball > 0 )
                        <tr>
                            <td scope="row" class="table-success">
                                <div class="custom-control custom-radio">
                                    <input name="answer{{$answer->id}}" class="custom-control-input" type="radio" checked disabled>
                                    <label class="custom-control-label w-100">
                                        {{ $answer->title }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td scope="row">
                                <div class="custom-control custom-radio">
                                    <input name="answer{{$answer->id}}" class="custom-control-input" type="radio" disabled>
                                    <label class="custom-control-label w-100">
                                        {{ $answer->title }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>


    @else
        <form action="{{ route('testAdd', $question->id) }} " method="post" class="mb-2">
            @csrf
            <p class="lead my-1" >
                {!! $loop->iteration.'. '.$question->getTitleFilt() !!}
            </p>
            <table class="table table-sm rounded overflow-hidden border table-hover mb-1">
                <tbody>
                    @foreach($question->answers as $answer)
                        <tr>
                            <td>
                                <div class="custom-control custom-radio d-flex align-items-center">
                                    <input name="test_answer_id" class="custom-control-input" type="radio" id="answer{{$answer->id}}" required value="{{ $answer->id }}">
                                    <label for="answer{{$answer->id}}" class="custom-control-label w-100">
                                       {{ $answer->title }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
                <button class="btn btn-sm btn-primary">{{ __('app.verify') }}</button>
            </div>
        </form>
    @endif
@endforeach
        </div>
    </div>
</div>
@endsection

   

   


