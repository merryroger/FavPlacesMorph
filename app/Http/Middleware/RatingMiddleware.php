<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Place;

class RatingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $places = Place::count();
        return ($places) ? $next($request) : redirect()->route('place.show_all');
    }

}
