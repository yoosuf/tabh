<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {




        if (Auth::guard($guard)->check()) {

            return $next($request);


//            if ($request->user()->is_complete == true) {
//
//                if (Cart::count() == 0 ) {
//                    return redirect()->to('/search?type=pharmaceutical');
//                } else {
//                    return back()->withInput();
//                }

//                return back()->withInput();
//            }
//
//            return back()->withInput();
        }

        return $next($request);
    }
}
