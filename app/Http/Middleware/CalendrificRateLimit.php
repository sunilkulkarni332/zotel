<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class CalendrificRateLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Define rate limit (e.g., 100 requests per hour)
        $rateLimit = 1;
        $rateLimitPeriod = 60 * 60; // in seconds (1 hour)
        $cacheKey = 'calendrific_api_requests';

        // Get the current request count
        $requestCount = Cache::get($cacheKey, 0);

        if ($requestCount >= $rateLimit) {
            return response()->json(['error' => 'Rate limit exceeded'], 429);
        }

        // Increment request count
        Cache::put($cacheKey, $requestCount + 1, $rateLimitPeriod);

        return $next($request);
    }
}
