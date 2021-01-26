<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TestQuestion;
use App\TestAnswer;
use App\Training;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        //
    }

    public function show($training_id)
    {
        return view('admin.tests.index',[
            'training' => Training::with('testQuestions.adminAnswers')->find($training_id),
        ]);
    }

    public function create(Request $request)
    {
        if( $request->id > 0 && !is_null($request->id) ){
            return view('admin.tests.create',[
                'training_id' => $request->id,
            ]);
        }
        return redirect()->route('admin.courses.index');
    }

    public function store(Request $request)
    {
        $params = $request->all();

        for($i = 0; $i < count($params['right']); $i++ ){

            $testQuestion = TestQuestion::filterQuestion(
                $params['training_id'][$i], $params['question'][$i]
            );
            $question = TestQuestion::create($testQuestion);

            $answers = TestAnswer::filterAnswers(
                $params['right'][$i],$params['wrong1'][$i],
                $params['wrong2'][$i],$params['wrong3'][$i]
            );

            $question->answers()->createMany($answers);
        }
        return redirect()->route('admin.tests.show', $params['training_id']);
    }

    public function edit($testQuestion)
    {
        return view('admin.tests.edit',[
            'testQuestion' => TestQuestion::find($testQuestion),
        ]);
    }

    public function update(Request $request, $testQuestion)
    {   
        $question = TestQuestion::find($testQuestion);
        $question->saveQuestion($request->question);
        $index = 0;
        foreach( $question->answers as $answer )
        {
            $answer->update( ['title' => $request->answers[$index++] ]);
        }
        return redirect()->route('admin.tests.show', $question->training->id);
    }

    public function destroy($testQuestion)
    {
        $question = TestQuestion::find($testQuestion);
        if( isset($question) ){
            $question->delete();
        }
        return redirect()->back();
    }
}
