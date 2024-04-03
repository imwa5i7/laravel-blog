<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PostLocal
{
    public $title;
    public $slug;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($t,$s,$e, $d, $b)
    {
        $this->title = $t;
        $this->slug = $s;
        $this->excerpt = $e;
        $this->date = $d;
        $this->body = $b;
    }




    public static function all()
    {
        // $files =  File::allFiles(resource_path("posts/"));

        // return array_map(
        //     fn ($file) =>
        //     $file->getContents(),
        //     $files
        // );

        return Cache::rememberForever("posts.all",function(){
            return collect(File::files(resource_path("posts")))->map(
                fn ($file) => YamlFrontMatter::parseFile($file)
            )->map(function ($document) {
                return new Post($document->title,$document->slug,$document->excerpt, $document->date, $document->body(),);},)->sortByDesc('date');

        });

    }

    public static function find($slug)
    {
        // $path = __DIR__ . "/../resources/posts/{$slug}.html";
        // $path = resource_path("posts/$slug.html");


        // if (!file_exists($path)) {
        //     return new ModelNotFoundException();
        // }
        // return Cache::remember("posts.{$slug}", 1200, fn () => file_get_contents($path));
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug){
        $post=static::find($slug);
        if(!$post){
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
