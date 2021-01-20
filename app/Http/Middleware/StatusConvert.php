<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StatusConvert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('status')) {
            $request->offsetSet('status', $request->boolean('status'));
        }
        return $next($request);
    }
}
