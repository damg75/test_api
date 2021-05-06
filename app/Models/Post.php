<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'slug'
    ]; //pseudo params

    protected static function boot()
    {
        parent::boot();
        //model events
        static::created(function ($post) {
            
            $post->slug = $post->createSlug($post->title);
            
            $post->save();
        });
        // static::updated(function ($post) {
            
        //     $post->slug = $post->createSlug($post->title);
            
        //     $post->save();
        // });
    }

    private function createSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {

            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
