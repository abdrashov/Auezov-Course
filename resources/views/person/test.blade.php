@extends('layouts.app')

@section('title', $training->title )

@section('content')
<div class="container my-4">
<div class="bg-white px-3 py-4 shadow-sm training-header rounded overflow-hidden"> 
    <p class="h2">
        {{ $training->title }}
    </p>
    @foreach($training->testResults as $result)
        @if( $result->checkAnswer() )
            <p class="lead my-1" id="id{{ $result->id }}">
                {!! $loop->iteration.'. '.$result->question->getTitleFilt() !!}
            </p>
            <table class="table table-sm rounded overflow-hidden border mb-3">
                @foreach($result->question->answers as $answer)
                    <tr>
                        @if( $result->test_answer_id === $answer->id )
                            <td scope="row" class="@isanswer($answer->ball) table-success @else table-danger @endisanswer">
                                <div class="custom-control custom-radio">
                                    <input name="answer{{$answer->id}}" class="custom-control-input" type="radio" checked disabled>
                                    <label class="custom-control-label w-100 font-weight-bold">
                                        {{ $answer->title }}
                                    </label>
                                </div>
                            </td>
                        @else
                            <td scope="row" class="@isanswer($answer->ball) table-success @endisanswer">
                                <div class="custom-control custom-radio">
                                    <input name="answer{{$answer->id}}" class="custom-control-input" type="radio" checked disabled>
                                    <label class="custom-control-label w-100">
                                        {{ $answer->title }}
                                    </label>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        @else
            <form action="{{ route('testAdd', $result->id.'#id'.$result->id) }} " method="post" class="mb-2">
                @csrf
                <p class="lead my-1" id="id{{ $result->id }}">
                    {!! $loop->iteration.'. '.$result->question->getTitleFilt() !!}
                </p>
                <table class="table table-sm rounded overflow-hidden border table-hover mb-1">
                    @foreach($result->question->answers as $answer)
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
                </table>
                <div class="text-right">
                    <button class="btn btn-sm btn-primary">{{ __('app.verify') }}</button>
                </div>
            </form>
        @endif
    @endforeach
</div>
</div>
@endsection

   

   


