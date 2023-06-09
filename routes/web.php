<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/', function () {    
    return view('blogs',[
        'blogs'=>Blog::all()
    ]);
});

Route::get('/blogs/{slug}',function ($slug){    
    return view('blog',[
        'blog'=>Blog::findOrFail($slug)
    ]);
})->where('blog', '[A-z\d\-_]');