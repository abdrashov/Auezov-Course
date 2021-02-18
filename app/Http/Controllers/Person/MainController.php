<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Course;
use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
	public function home()
	{
	 	return view('person.home',[
	  	'user' => Auth::user(),
	 	]);
	}

	public function userCourse()
	{
		return view('person.course', [
  		'user' => Auth::user(),
		]);
	}

	public function module(Course $course)
	{
		$course = $course->load('lessons.users', 'modules.lessons.trainings.users');
		foreach ( $course->lessons as $lesson ) {
			if( !$lesson->users->contains(Auth::id()) ){
				$lesson->users()->attach(Auth::id());
			}
		}
		return view('person.module',[
	   	'course' => $course,
		]);
	}

	public function training(Course $course, Training $training)
	{
		if( !$training->users->contains(Auth::id()) ){
			$training->users()->attach(Auth::id());
		}
		return view('person.training', [
		 	'training' => $training
		]);
	}
}
