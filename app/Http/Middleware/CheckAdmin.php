<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
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
        $admin = Auth::user();
        if ($admin->level > 0) {
            return $next($request);
        }
        return redirect()->back()->with('note', 'Ban khong co quyen lam viec nay!');
    }
}
