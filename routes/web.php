<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // DB::listen(function ($query){
    //     logger($query->sql,$query->bindings);
    // });
    return view('posts', [
        // 'posts' => Post::all()
        'posts' => Post::with('category')->get()
    ]);
});


Route::get('/posts/{post:slug}', function (Post $post) {
    //Post::where('slug',$post)->firstOrFail();
    return view('post', ['post' => $post]);

    // $path=__DIR__ . "/../resources/posts/{$input}.html";
    // if(!file_exists($path)){
    //     // abort(404);
    //     return redirect('/');
    // }
    // $mypost=cache()->remember("posts.{$input}",now()->addMinutes(1), function () use ($path) {
    //     var_dump("file_get_contents");
    //     return file_get_contents($path);
    // });

    // return view('post',[
    //     'post' => $mypost
    // ]);
});


Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});


