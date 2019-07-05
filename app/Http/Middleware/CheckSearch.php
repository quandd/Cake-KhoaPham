<?php

namespace App\Http\Middleware;

use Closure;

class CheckSearch
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->key == null) {
            return back()->with('notice', 'Moi nhap tu khoa ben tren.');
        }
        return $next($request);
    }
}
