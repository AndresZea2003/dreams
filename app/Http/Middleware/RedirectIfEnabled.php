<?php

namespace App\Http\Middleware;

class RedirectIfEnabled
{
    public function handle($request, $next)
    {
        if (auth()->user()->disabled_at == null) {
            return redirect('home');
        }

        return $next($request);
    }
}
