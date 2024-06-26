<?php

use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Middleware\MustBeAdmin;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', NewsLetterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'login'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');


Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware(MustBeAdmin::class);
Route::post('admin/posts', [PostController::class, 'store'])->middleware(MustBeAdmin::class);






// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', ['posts' => $category->posts,
//     'currentCategory'=>$category,
//     'categories'=>Category::all()
// ]);
// })->name('category');

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts.index', ['posts' => $author->posts,
// ]);
// });
