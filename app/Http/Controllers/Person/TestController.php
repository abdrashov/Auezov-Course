<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TestQuestion;
use App\TestAnswer;
use App\Course;
use App\Training;
use App\TestResult;

class TestController extends Controller
{
	public function test(Course $course, Training $training)
	{
		$training = $training->load('testResults.question.answers');
		if( !$training->users->contains(Auth::id()) ){
			$training->users()->attach(Auth::id());
		}
		if( !$training->testResults()->exists() ){
			foreach( $training->testQuestions as $question ){
				$questions[] = [
					'user_id' => Auth::id(),
					'test_question_id' => $question->id,
				];
			}
			$training->testResults()->createMany($questions);
		}
		return view('person.test', [
			'training' => $training,
		]);
	}

	public function testAdd(TestResult $TestResult, Request $request)
	{
		if( is_null($request->test_answer_id) ){
			session()->flash('warning', 'Хорошая попытка, но это не сработает &#10084;');
			return redirect()->route('home');
		}
		$TestResult->saveAnswer($request->test_answer_id);
		return redirect()->back();
	}
}
