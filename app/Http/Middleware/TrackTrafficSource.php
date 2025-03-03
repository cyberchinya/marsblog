<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TrafficSource;

class TrackTrafficSource
{
    public function handle(Request $request, Closure $next)
    {
        $referer = parse_url($request->headers->get('referer'), PHP_URL_HOST);

        $source = $referer ?: 'direct';

        TrafficSource::updateOrCreate(
            ['source' => $source],
            ['count' => \DB::raw('count + 1')]
        );

        return $next($request);
    }
}
