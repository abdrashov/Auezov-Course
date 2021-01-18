<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
	protected $fillable = ['test_question_id', 'title', 'ball'];

	public static function filterAnswers($right, $wr1, $wr2, $wr3)
	{
		return [
			[
				'title' => $right, 
				'ball' => 1
			],
			[ 
				'title' => $wr1, 
				'ball' => 0
			],
			[
				'title' => $wr2, 
				'ball' => 0
			],
			[
				'title' => $wr3, 
				'ball' => 0
			],
		];
	}

	public function isBall()
	{
		return $this->ball > 0 ? true : false;
	}

	public function testResult()
	{
		return $this->hasMany(TestResult::class, 'test_answer_id');
	}

	public function scopeBallResult($query)
	{
		return $query->where('ball', '>', 0)->first();
	}
}
