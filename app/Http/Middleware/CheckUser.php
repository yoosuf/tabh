<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUser
{
    public function handle($request, Closure $next)
    {

        if(!empty(auth()->guard('user')->id()))
        {
            $data = DB::table('users')
                ->select('users.id')
                ->where('users.id',auth()->guard('user')->id())
                ->first();

            if (!$data->id  )
            {
                return redirect()->intended('/login')->with('status', 'You do not have access to user admin side');
            }

            if ($data->is_setup == false) {
                return redirect()->intended('/account/setup');
            }

            return $next($request);
        }
        else
        {
            return redirect()->intended('/login')->with('status', 'Please Login to access user admin area');
        }
    }
}