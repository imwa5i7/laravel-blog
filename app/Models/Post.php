<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $guarded = ['id',];

    protected $fillable = ['title', 'excerpt', 'slug', 'body', 'category_id'];
    protected $with = ['author', 'category'];
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function scopeFilter($query, array $filters)
    { //Post::newQuery::filter()
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
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
