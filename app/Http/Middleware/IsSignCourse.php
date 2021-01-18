<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsSignCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( !$request->course->users->contains(Auth::id()) ){
            return redirect()->route('course', $request->course->id)->with('warning', 'app.please.sign.up'); 
        }
        return $next($request);
    }
}
