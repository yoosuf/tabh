<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountSetup
{
    public function handle($request, Closure $next)
    {

        if (! $request->user()->isCompleted()) {

            return redirect()->intended('/account/setup');
        }

        return $next($request);

    }
}