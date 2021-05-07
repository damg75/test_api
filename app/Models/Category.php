<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($category) { // before delete() method call this
             $category->posts()->each(function($post) {
                $post->delete(); // <-- direct deletion
             });
        });
    }
}
