<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentController extends Controller
{


    public function store(){
        dd(request()->all());

    }




        // request()->validate([
        //     'body'=>'required'
        // ]);

        // $post->comment()->create([
        //     'user_id'=>request()->user()->id,
        //     'body'=>request('body'),
        // ]);

        // return back();


}
