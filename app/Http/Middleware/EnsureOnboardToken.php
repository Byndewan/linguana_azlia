<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EnsureOnboardToken
{
    const COOKIE_NAME = 'onboard_token';
    const COOKIE_MINUTES = 1440; // 24 hours, matches temp data cleanup window

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie(self::COOKIE_NAME);

        if (!$token) {
            $token = (string) Str::uuid();
            Cookie::queue(self::COOKIE_NAME, $token, self::COOKIE_MINUTES);
        }

        $request->attributes->set(self::COOKIE_NAME, $token);

        return $next($request);
    }
}
