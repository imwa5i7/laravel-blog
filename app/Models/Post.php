<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $guarded = ['id',];
    //alter table posts AUTO_INCREMENT=6;

    protected $fillable=['title','excerpt','slug','body','category_id'];
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function category(){
        return $this->belongsTo(Category::class);

    }
}



