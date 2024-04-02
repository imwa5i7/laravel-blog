<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    $posts= Post::all();
    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('/posts/{post}', function ($input) {



    return view('post', ['post' => Post::find($input)]);

    // $path=__DIR__ . "/../resources/posts/{$input}.html";
    // if(!file_exists($path)){
    //     // abort(404);
    //     return redirect('/');
    // }
    // $mypost=cache()->remember("posts.{$input}",now()->addMinutes(1), function () use ($path) {
    //     var_dump("file_get_contents");
    //     return file_get_contents($path);
    // });
    // $mypost=Cache::remember("posts.{$input}",now()->addMinutes(1), fn()=>file_get_contents($path));

    // return view('post',[
    //     'post' => $mypost
    // ]);
})->where('post', '[A-z_\-]+');
