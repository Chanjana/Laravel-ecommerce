<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;


class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {

        // below is the existing response

        // the user can be located with Auth facade

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(
                (auth()->user()->role->value == 1 || auth()->user()->role->value == 5 ) ? route("filament.admin.pages.dashboard") : route('dashboard')
            );
    }
}
