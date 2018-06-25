<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
            $user = User::where('email', $request->email)->first();
            if ($user->hasRole('admin')) {
                return redirect()->route('home.admin');
            } else if ($user->hasRole('operator')) {
                return redirect()->route('home.operator');
            } else if ($user->hasRole('client')) {
                return redirect()->route('home.client');
            }
        }

        return $next($request);
    }
}
