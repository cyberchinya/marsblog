<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Middleware\TrackVisitor;
use App\Models\Banner;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\TrafficAnalyticsController;


Route::get('/', function () {
    $posts = Post::latest()->get();
    return view('welcome', compact('posts'));
});

Route::middleware(TrackVisitor::class)->group(function () {
    Route::get('/', function () {
        $posts = \App\Models\Post::latest()->get();
        return view('welcome', compact('posts'));
    });

    Route::get('/post/{id}', function ($id) {
        $post = \App\Models\Post::findOrFail($id);
        return view('post', compact('post'));
    })->name('post.show');
});

Route::get('/', function () {
    $posts = \App\Models\Post::latest()->get();
    $bannersLeft = Banner::where('position', 'left')->get();
    $bannersRight = Banner::where('position', 'right')->get();
    return view('welcome', compact('posts', 'bannersLeft', 'bannersRight'));

});

Route::get('/sitemap.xml', function () {
    return Response::file(public_path('sitemap.xml'), ['Content-Type' => 'application/xml']);
});

Route::get('/analytics/traffic', [TrafficAnalyticsController::class, 'index'])->name('analytics.traffic');
Route::get('/analytics/traffic/chart-data', [TrafficAnalyticsController::class, 'chartData'])->name('analytics.traffic.chart-data');

Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');
