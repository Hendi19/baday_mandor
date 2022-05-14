<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $primaryKey = "id";

    protected $fillable = [
        'title','slug','excerpt','image','body','category_id'
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    //  public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }

}


