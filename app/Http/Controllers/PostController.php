<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(){

        // $path= ;
        $attributes= request()->validate(
            [
                'title'=>'required',
                'slug'=>['required',Rule::unique('posts','slug')],
                'excerpt'=>'required',
                'thumbnail'=>'required|image',
                'body'=>'required',
                'category_id'=>['required',Rule::exists('categories','id')]
            ]
        );

        $attributes['user_id']= auth()->id();
        $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnail');
        Post::create($attributes);

        return redirect('/')->with('success','Post Created Successfully');
    }
}
