<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckActiveUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if($user->roles()->name == 'Parent'){
            abort(403);
        }

        abort_if(($user->status == 0), 403, 'Unauthorised Access - Account Disabled. Contact the Administrator');

        return $next($request);
    }
}
