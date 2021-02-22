<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Lesson;

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

	public function lessonsBall(Lesson $lesson)
	{
		return view('admin.appraisals.users', [
			'lesson' => $lesson,
		]);
	}

	public function ball(Lesson $lesson)
	{
		return view('admin.appraisals.ball', [
			'lesson' => $lesson,
		]);
	}

	public function lessonsUpdate(Lesson $lesson, Request $request){
		foreach( $request->users as $index => $user){
			$user_ball = $lesson->users()->find($user)->pivot;
			$user_ball->ball = $request->balls[$index];
			$user_ball->save();
		}
		return redirect()->back()->with('message', 'Успешно');
	}
}
