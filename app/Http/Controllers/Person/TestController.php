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
		return view('person.test', [
			'training' => $training->load('testQuestions.answers', 'testQuestions.testResult', 'testQuestions.answers.testResult'),
		]);
	}

	public function testAdd(TestQuestion $TestQuestion, Request $request)
	{
		$test = $TestQuestion->testResult()->whereTraining();
		if( !$test->exists() ){
			$test->create([
				'user_id' => Auth::id(),
				'test_answer_id' => $request->test_answer_id,
			]);
		}
		return redirect()->back();
	}
}
