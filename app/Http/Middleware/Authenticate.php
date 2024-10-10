<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (auth()->check()) {
                if (auth()->user()->role_id == 1) {
                    return route('admin.dashboard');
                }
                if (auth()->user()->role_id == 2) {
                    return route('vendor.dashboard');
                }
            }
                return route('login');




        }
    }
}
