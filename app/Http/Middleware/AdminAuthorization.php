<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\Role;

class AdminAuthorization
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role->value === 1) {  //$request->user()->role->value === 1 check if the user has role attribute and that is == 1
            return $next($request); //better not to put this inside the condition
        }

        abort(403, 'Unauthorized.');
    }
}
