<?php

namespace App\Http\Middleware;

class RedirectIfDisabled
{
    public function handle($request, $next)
    {
        if (auth()->user()->disabled_at !== null) {
            return redirect('user-disabled');
        }

        return $next($request);
    }
}
