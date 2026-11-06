<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureApiKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $providedKey = $request->header('X-API-KEY');
        $configuredKey = config('services.api.access_key');

        if (! $configuredKey || ! is_string($providedKey) || ! hash_equals($configuredKey, $providedKey)) {
            return response()->json(['message' => 'A valid X-API-KEY header is required.'], 401);
        }

        return $next($request);
    }
}
