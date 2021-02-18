<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestQuestion extends Model
{
	use SoftDeletes;

	protected $fillable = ['training_id', 'title'];

   public function answers()
   {
      return $this->hasMany(TestAnswer::class)->inRandomOrder();
   }

   public function adminAnswers()
   {
      return $this->hasMany(TestAnswer::class);
   }

   public function training()
   {
      return $this->belongsTo(Training::class);
   }

   public function testResults()
   {
      return $this->hasOne(TestResult::class, 'test_question_id');
   }

   public static function filterQuestion($training_id, $question)
   {
   	return [
			'training_id' => $training_id, 
			'title' => $question,
      ];
   }

   public function saveQuestion($question)
   {
		$this->title = $question;
		$this->save();
   }

   public function getTitleFilt()
   {
      $text = str_replace(array("\r\n", "\r", "\n"), "</br>",  $this->title);
      $text = str_replace(array("\t"), "&nbsp; &nbsp;&nbsp;", $text);
      $text = str_replace(array("  "), "&nbsp;&nbsp;", $text);
      return $text;
   }

}
