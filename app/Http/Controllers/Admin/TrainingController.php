<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Training;
use App\Lesson;
use Illuminate\Http\Request;

class TrainingController extends Controller
{

    public function index()
    {
        //
    }

    public function show($lesson_id)
    {
        return view('admin.trainings.index',[
            'lesson' => Lesson::find($lesson_id),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Training::create($request->all());
        return back();
    }

    public function edit(Training $training)
    {
        return view('admin.trainings.edit',[
            'training' => $training,
        ]);
    }

    public function update(Request $request, Training $training)
    {
        $training->update($request->all());
        return redirect()->route('admin.trainings.show', $training->lesson->id);
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->back();
    }
}
