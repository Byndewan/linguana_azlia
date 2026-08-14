<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOnBoarding
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $step): Response
    {
        if (in_array($step, ['2', '3', 'test']) && !session()->has('onboarding_language_id')) {
            return redirect()->route('choose-language');
        }

        if (in_array($step, ['3', 'test']) && !session()->has('type')) {
            return redirect()->route('choose-path');
        }

        if ($step === 'test' && session('type') !== 'test_prep') {
            return redirect()->route('choose-daily-goal');
        }

        return $next($request);
    }
}
