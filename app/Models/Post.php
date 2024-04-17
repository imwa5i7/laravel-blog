<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $with = ['author', 'category'];
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function scopeFilter($query, array $filters)
    { //Post::newQuery::filter()
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(fn($query)=>$query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%'));

        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            // return $query->whereExists(fn ($query) =>
            // $query->from('categories')
            //     ->whereColumn('categories.id', 'posts.id')
            //     ->where('categories.slug', $category));
            return $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)

            );
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)

            );
        });
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    { //author_id
        return $this->belongsTo(User::class, 'user_id');
    }
}
