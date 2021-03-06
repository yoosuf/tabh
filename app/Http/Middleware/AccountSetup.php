<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountSetup
{
    public function handle($request, Closure $next)
    {

        if ($request->user()->is_complete == false) {

            return redirect()->intended('/account/setup');
        }


        return $next($request);

    }
}