<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Module;
use App\Course;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function index()
    {
        //
    }

    public function show($course_id)
    {
        return view('admin.modules.index',[
            'course' => Course::with('modules.lessons')->find($course_id),
        ]);
    }

    public function create(Request $request)
    {
        if( $request->id > 0 && !is_null($request->id) ){
            return view('admin.modules.create',[
                'course_id' => $request->id,
            ]);
        }
        return redirect()->route('admin.courses.index');
    }

    public function store(Request $request)
    {
        $params = [];
        $index = $request->index;
        $title = $request->title;
        $course_id = $request->course_id;
        for($i = 0; $i < count($index); $i++ ){
            $params[] = [
                'index' => $index[$i],
                'title' => $title[$i],
            ];
        }
        Course::find($course_id)->modules()->createMany($params);
        return redirect()->route('admin.modules.show', $course_id);
    }

    public function edit(Module $module)
    {
        return view('admin.modules.edit',[
            'module' => $module,
        ]);
    }

    public function update(Request $request, Module $module)
    {
        $module->update($request->all());
        return redirect()->route('admin.modules.show', $module->course->id);
    }

    public function destroy(Module $module)
    {
        $course_id = $module->course->id;
        $module->delete();
        return redirect()->route('admin.modules.show', $course_id);    
    }
}
