<?php

namespace App\Http\Middleware;

use Closure;
use App\Course;

class isStatusCourse
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
        // if( !Course::find($request->course)->isStatus() ){
        //     return redirect()->route('/')->with('warning', 'app.course.hide.to');
        // }
        return $next($request);
    }
}
