<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $user=User::factory()->create();

        Post::factory(5)->create([
            'user_id'=>$user->id,
        ]);


        // $user=User::factory()->create();

        // $personal= Category::create([
        //     'title'=>'Personal',
        //     'slug'=>'personal'
        // ]);

        // $work=Category::create([
        //     'title'=>'Work',
        //     'slug'=>'work'
        // ]);

        // $hobby= Category::create([
        //     'title'=>'Hobbies',
        //     'slug'=>'hobbies'
        // ]);

        // Post::create([
        //     'user_id'=> $user->id,
        //     'category_id'=>$personal->id,
        //     'title'=>'My personal post',
        //     'slug'=>'my-personal-post',
        //     'excerpt'=>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>",
        //     'body'=>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        //     standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
        //     type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
        //     remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
        //     Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of
        //     Lorem Ipsum.</p>",
        // ]);

        // Post::create([
        //     'user_id'=> $user->id,
        //     'category_id'=>$work->id,
        //     'title'=>'My work post',
        //     'slug'=>'my-work-post',
        //     'excerpt'=>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>",
        //     'body'=>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        //     standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
        //     type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
        //     remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
        //     Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of
        //     Lorem Ipsum.</p>",
        // ]);

        // Post::create([
        //     'user_id'=> $user->id,
        //     'category_id'=>$hobby->id,
        //     'title'=>'My hobby post',
        //     'slug'=>'my-hobby-post',
        //     'excerpt'=>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>",
        //     'body'=>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        //     standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
        //     type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
        //     remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
        //     Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of
        //     Lorem Ipsum.</p>",
        // ]);



    }
}
