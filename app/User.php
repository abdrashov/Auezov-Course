<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->is_admin === 1 ? 'admin' : 'user';
    }

    public function checkAdmin()
    {
        return $this->is_admin === 1;
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class)->withPivot('ball')->withPivot('count_question')->withPivot('test')->withPivot('status')->withTimestamps();
    }

    public function testResults()
    {
        return $this->hasMany(TestResult::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class)->withTimestamps();
    }

    public function pivot_ball()
    {
        if( !is_null($this->pivot->ball) ){
            $ball = intval($this->pivot->ball * 0.6);
        }
        return $ball ?? null;
    }

    public function pivot_test()
    {
        if( $this->pivot->status > 0 ){
            $sum = intval(((100/$this->pivot->count_question)*$this->pivot->test) * 0.4);
        }
        return $sum ?? null;
    }
}
