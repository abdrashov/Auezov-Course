<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Module;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        //
    }
    
    public function show($module_id)
    {
        return view('admin.lessons.index',[
            'module' => Module::with('lessons.trainings')->find($module_id),
        ]);
    }

    public function create(Request $request)
    {
        if( $request->id > 0 && !is_null($request->id) ){
            return view('admin.lessons.create',[
                'module_id' => $request->id,
            ]);
        }
        return redirect()->route('admin.courses.index');
    }

    public function store(Request $request)
    {
        $params = [];
        $index = $request->index;
        $title = $request->title;
        $module_id = $request->module_id;
        for($i = 0; $i < count($index); $i++ ){
            $params[] = [
                'module_id' => $module_id,
                'index' => $index[$i],
                'title' => $title[$i],
            ];
        }
        Lesson::insert($params);
        return redirect()->route('admin.lessons.show', $module_id);
    }

    public function edit(Lesson $lesson)
    {
        return view('admin.lessons.edit',[
            'lesson' => $lesson,
        ]);
    }

    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update($request->all());
        return redirect()->route('admin.lessons.show', $lesson->module->id);
    }

    public function destroy(Lesson $lesson)
    {
        $module_id = $lesson->module->id;
        $lesson->delete();
        return redirect()->route('admin.lessons.show', $module_id);   
    }
}
