<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	protected $fillable = ['course_id', 'index', 'title'];

   public function lessons()
   {
   	return $this->hasMany(Lesson::class)->orderBy('index');
   }

   public function course()
   {
   	return $this->belongsTo(Course::class);
   }


}
