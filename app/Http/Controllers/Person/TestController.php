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
			'training' => $training->load('testResults.question.answers'),
		]);
	}

	public function testAdd(TestResult $TestResult, Request $request)
	{
		$TestResult->saveAnswer($request->test_answer_id);

		return redirect()->back();
	}
}
