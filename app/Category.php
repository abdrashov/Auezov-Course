<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function localTitle()
	{
		switch (app()->getLocale()) {
			case 'en':
				return $this->title_en;
				break;
			case 'kk':
				return $this->title_kk;
				break;
			default:
				return $this->title;
				break;
		}
	}
}
