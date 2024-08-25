<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogHttpRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        Log::info('request', [
            'timestamp' => now()->toDateTimeString(),
            'method' => $request->method(),
            'uri' => $request->fullUrl(),
            'headers' => $request->headers->all(),
            'body' => $request->all(),
            'ip_address' => $request->ip(),
            'user_id' => auth()->check() ? auth()->id() : null
        ]);

        $response = $next($request);

        $endTime = microtime(true);
        $duration = $endTime - $startTime;

        Log::info('response', [
            'timestamp' => now()->toDateTimeString(),
            'status' => $response->getStatusCode(),
            'headers' => $response->headers->all(),
            'duration' => $duration
        ]);

        return $response;
    }
}
