<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        //$roles is an array like this ["admin","guest","teacher","student"];        
        $your_role = $request->user()->role; //like "admin"
        if (! in_array($your_role, $roles, true)) {
            // Redirect...
            return redirect('/home');  
        }
        return $next($request);

    }
}
