<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TestResult extends Model
{
	protected $fillable = ['user_id', 'test_question_id', 'test_answer_id'];

	public function scopeWhereTraining($query)
	{
		return $query->where('user_id', Auth::id());
	}

	public function question()
	{
		return $this->belongsTo(TestQuestion::class, 'test_question_id');
	}
}
