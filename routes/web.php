<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

//Route::get('/', function () {
   // return view('welcome');
// }); 

Route::get('/', function () {
    $posts = Post::latest()->get();
    return view('welcome', compact('posts'));
});