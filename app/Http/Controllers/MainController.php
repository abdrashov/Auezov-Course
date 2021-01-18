<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;

class MainController extends Controller
{
	public function index()
	{
		return view('welcome',[
			'courses' => Course::ativeCourses()->with('category')->get(),
		]);
	}

	public function course(Course $course)
	{
		return view('course',[
			'course' => $course,
		]);
	}

	public function search(Request $request)
	{
		$courses = Course::query()->ativeCourses();
		if( $request->search ){
			$courses = $courses->search($request->search)->get();
		}else{
			$courses = $courses->get();
		}
		return view('search',[
			'courses' => $courses,
		]);
	}
}
