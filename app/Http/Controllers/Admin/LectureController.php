<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lecture;
use App\Course;
use Illuminate\Http\Request;

class LectureController extends Controller
{
	public function index()
	{
	  //
	}

	public function show($course_id)
	{
		return view('admin.lectures.index',[
			'course' => Course::find($course_id),
		]);
	}

	public function create(Request $request)
	{
	  	if( $request->id > 0 && !is_null($request->id) ){
	      return view('admin.lectures.create',[
	         'course_id' => $request->id,
	      ]);
	  	}
	  return redirect()->route('admin.courses.index');
	}

	public function store(Request $request)
	{
		$course_id =  $request->get('course');
		$lecture_id = $request->get('index');
		$lecture = $request->file('lecture');

		for( $i = 0; $i < count($lecture_id); $i++ ) {
			if( $lecture[$i] ){
				$path = $lecture[$i]->store('lectures');
			}
		   $params[] = [
				'index' => $lecture_id[$i],
				'file' => $path,
		   ];
		}
		Course::find($course_id)->lectures()->createMany($params);
		return redirect()->route('admin.lectures.show', $course_id);
	}

	public function edit(Lesson $lesson)
	{
		//
	}

	public function update(Request $request, Lesson $lesson)
	{
		//
	}

	public function destroy(Lecture $lecture)
	{
		$course_id = $lecture->course->id;
		$lecture->delete();
		return redirect()->route('admin.lectures.show', $course_id);   
	}
}
