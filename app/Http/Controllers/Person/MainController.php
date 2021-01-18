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
		return view('person.module',[
		   'course' => $course->load('modules.lessons.trainings.users'),
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
