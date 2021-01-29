<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StatusConvert
{
    protected $boolean = [
        'status',
        'is_pro',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post')) {
            foreach ($this->boolean as $key) {
                if ($request->has($key)) {
                    $request->offsetSet($key, $request->boolean($key));
                }
            }
        }

        return $next($request);
    }
}
