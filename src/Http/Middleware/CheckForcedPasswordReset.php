<?php

namespace Sebbaum\Legal\Middleware;

use Closure;
use Sebbaum\Legal\Models\Lawyer;

class CheckForcedPasswordReset
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var Lawyer $lawyer */
        $lawyer = $request->user('legal');
        if ($lawyer->isForcedToResetPassword()) {
            dd('Lawyer must reset password!');
            // TODO: redirect to appropriate view
        }
        return $next($request);
    }
}
