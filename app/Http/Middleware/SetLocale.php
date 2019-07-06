<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
        app()->setLocale($request->segment(1));//todo mai bine sa luati din headers limba, in url este rescul de buguri, mai ales dupa segment(1)
        return $next($request);
    }
}
