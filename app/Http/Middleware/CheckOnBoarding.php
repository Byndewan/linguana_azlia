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
        if ($step >= 2 && !session()->has('onboarding_language_id')) {
            return redirect()->route('choose-language')->with('error', 'Choose language first!');
        }

        if ($step >= 3 && !session()->has('type')) {
            return redirect()->route('choose-path')->with('error', 'Choose your learning path!');
        }

        if ($step == 'test' && session('type') !== 'test_prep') {
            return redirect()->route('choose-daily-goal');
        }

        return $next($request);
    }
}
