<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Middleware\TrackVisitor;

//Route::get('/', function () {
   // return view('welcome');
// }); 



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