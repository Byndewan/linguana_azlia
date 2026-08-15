<?php

namespace App\Http\Middleware;

use App\Models\OnboardTempData;
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
        $token = $request->attributes->get(EnsureOnboardToken::COOKIE_NAME);
        $data = $token ? OnboardTempData::where('token', $token)->first() : null;

        if (in_array($step, ['2', '3', 'test']) && !$data?->onboarding_language_id) {
            return redirect()->route('choose-language');
        }

        if (in_array($step, ['3', 'test']) && !$data?->type) {
            return redirect()->route('choose-path');
        }

        if ($step === 'test' && $data?->type !== 'test_prep') {
            return redirect()->route('choose-daily-goal');
        }

        return $next($request);
    }
}
