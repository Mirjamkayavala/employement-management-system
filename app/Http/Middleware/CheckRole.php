<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Model\Role;
// use

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
{
    // Check if the user is authenticated
    if (!auth()->check()) {
        abort(403, 'Unauthorized action.'); // User is not authenticated
    }



    // If the user has the appropriate role, proceed
    return $next($request);
}

}
