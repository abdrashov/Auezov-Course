<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;

class AppraisalController extends Controller
{
	public function courses()
	{
		return view('admin.appraisals.courses', [
			'courses' => Course::get(),
		]);
	}

	public function followers(Course $course)
	{
		return view('admin.appraisals.followers', [
			'course' => $course,
		]);
	}

	public function lessonsShow(Course $course)
	{
		return view('admin.appraisals.lessons', [
			'course' => $course,
		]);
	}
}
