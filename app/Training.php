<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Training extends Model
{
	protected $fillable = ['lesson_id', 'title', 'text', 'link'];

	public function testQuestions()
	{
		return $this->hasMany(TestQuestion::class);
	}

	public function testResults()
	{
		return $this->hasMany(TestResult::class)->where('user_id', Auth::id());
	}

	public function lesson()
	{
		return $this->belongsTo(Lesson::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class)->withTimestamps();
	}

	public function getTextFilt($text)
	{
		$text = str_replace(array("\r\n", "\r", "\n"), "</br>",  $text);
		$text = str_replace(array("\\t\t", "\\t", "\t"), "&nbsp; &nbsp;", $text);
		return '<p>'.$text.'</p>';
	}

	public function contentAdmin()
	{
		if( isset($this->link) ){
			return  '<div class="embed-responsive embed-responsive-16by9">'.$this->link.'</div>';
		}else if( isset($this->text) ){
			return $this->getTextFilt($this->text);
		}else{
			return null;
		}
	}

	public function isTest()
	{
		if( isset($this->link) || isset($this->text) ){
			return false;
		}else{
			return true;
		}
	}
}
