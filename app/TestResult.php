<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TestResult extends Model
{
	protected $fillable = ['user_id', 'training_id', 'test_question_id', 'test_answer_id'];

	public function question()
	{
		return $this->belongsTo(TestQuestion::class, 'test_question_id');
	}

	public function training()
	{
		return $this->belongsTo(Training::class);
	}

	public function saveAnswer($answer_id)
	{
		$this->test_answer_id = $answer_id;
		$this->save();
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function checkAnswer()
	{
	  	return $this->test_answer_id > 0;
	}
}
