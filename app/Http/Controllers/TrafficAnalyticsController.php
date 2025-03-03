<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrafficSource;

class TrafficAnalyticsController extends Controller
{
    public function index()
    {
        $sources = TrafficSource::orderByDesc('count')->get();
        return view('analytics.traffic', compact('sources'));
    }

    public function chartData()
    {
        // $data = TrafficSource::select('source', 'count')->get();
        // return response()->json($data);
        $data = [
            'labels' => ['Google', 'Facebook', 'Twitter', 'Direct', 'Yandex', 'Vk'],
            'values' => [150, 200, 100, 250],
        ];
    }
}
