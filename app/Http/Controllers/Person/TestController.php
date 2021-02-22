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
use App\Lesson;

class TestController extends Controller
{
	public function test(Course $course, Lesson $lesson, Training $training)
	{
		if( $lesson->trainings->count() <= Auth::user()->trainings()->where('lesson_id', $lesson->id)->count()+1 ){
			if( !is_null($lesson->users()->find(Auth::id())->pivot->ball) ){
				if( !$training->users->contains(Auth::id()) ){
					$training->users()->attach(Auth::id());
				}
				$training = $training->load('testResults.question.answers');
				if( !$training->testResults()->exists() ){
					foreach( $training->testQuestions as $question ){
						$questions[] = [
							'user_id' => Auth::id(),
							'test_question_id' => $question->id,
						];
					}
					$training->testResults()->createMany($questions);
				}

				$training = Training::with('testResults.question.answers')->find($training->id);
				return view('person.test', [
					'training' => $training,
				]);
			}
			return redirect()->back()->with('warning', 'app.you.will.not.be.able');
		}
		return redirect()->back()->with('error', 'app.you.will.not.be');
	}

	public function testAdd(TestResult $testresult, Request $request)
	{
		if( is_null($request->test_answer_id) ){
			session()->flash('warning', 'Хорошая попытка, но это не сработает &#10084;');
			return redirect()->route('home');
		}

		$testresult->saveAnswer($request->test_answer_id);
		$ball = Auth::user()->lessons()->find($testresult->training->lesson_id)->pivot;
		if( TestAnswer::find($request->test_answer_id)->ball > 0 ){
			$ball->test += 1;
		}
		if( empty(TestResult::where('training_id', $testresult->training_id)->whereNull('test_answer_id')->first()) ){
			$ball->status = 1;
		}
		$ball->count_question += 1;
		$ball->save();
		return redirect()->back();
	}
}
