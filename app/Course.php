<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
	protected $fillable = ['category_id', 'title', 'status', 'description', 'lang', 'start', 'end', 'image'];

	public function users()
	{
	  	return $this->belongsToMany(User::class)->withTimestamps();
	}

	public function activeUser(){
		return $this->users()->find(Auth::id());
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function modules()
	{
		return $this->hasMany(Module::class)->orderBy('index');
	}

	public function lectures()
	{
		return $this->hasMany(Lecture::class)->orderBy('index');
	}

	public function scopeSearch($query, $search)
	{
		return $query->where('title', 'like', '%'.$search.'%' );
	}

	public function isStatus()
	{
		return ($this->status === 1) ? 'Видно' : 'Скрыть';
	}

	public function isStatusCourse()
	{
		return $this->status === 1;
	}

	public function dateFormat($date)
	{
		return date('d.m.Y', strtotime($date));
	}

	public function dateStart()
	{
		return $this->dateFormat($this->start);
	}

	public function dateEnd()
	{
		return $this->dateFormat($this->end);
	}

	public function scopeAtiveCourses($query)
	{
		return $query->where('status', '1');
	}

	public function getTextFilt()
	{
		$text = str_replace(array("\r\n", "\r", "\n"), "</br>",  $this->description);
		$text = str_replace(array("\\t\t", "\\t", "\t"), "&nbsp;&nbsp;&nbsp;&nbsp;", $text);
		return $text;
	}
}
