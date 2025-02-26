<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VisitorLog;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        VisitorLog::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'url' => $request->fullUrl(),
        ]);

        return $next($request);
    }
}

