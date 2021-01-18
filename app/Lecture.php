<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
	protected $fillable = ['index', 'course_id', 'file'];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}
}
