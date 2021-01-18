<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
   public function signCourse(Course $course)
   {
		$course->users()->attach(Auth::id());
		return back();
   }
   
}
