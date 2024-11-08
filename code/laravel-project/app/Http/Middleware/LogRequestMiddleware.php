<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $duration = 0;

        // Логируем запрос
        Log::create([
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'IP' => $request->ip(),
            'duration' => $duration,
            'time' => now(),
            'input' => json_encode($request->all()),
            'user_id' => Auth::id(),
        ]);

        return $response;
    }
}
