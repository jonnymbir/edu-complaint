<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordChangeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->password_changed_at == null) {
            return redirect()->route('change_password')->with('success', 'You are now logged in to the system. Please change your password to continue using the system');
        }

        return $next($request);
    }
}
