<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	protected $fillable = ['index', 'title', 'module_id'];

   public function trainings()
   {
   	return $this->hasMany(Training::class);
   }

   public function module()
   {
   	return $this->belongsTo(Module::class);
   }
}
