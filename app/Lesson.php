<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	protected $fillable = ['index', 'title', 'module_id', 'user_id'];

	public function trainings()
	{
		return $this->hasMany(Training::class);
	}

	public function module()
	{
		return $this->belongsTo(Module::class);
	}

  public function users()
  {
    return $this->belongsToMany(User::class)->withPivot('test')->withPivot('count_question')->withPivot('ball')->withPivot('status')->withTimestamps();
  }

  public function course()
  {
    return $this->belongsTo(Course::class);
  }
}
