<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\Role;

class AdminAuthorization
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role->value === 1) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
