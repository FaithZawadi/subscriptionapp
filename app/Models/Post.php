<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [,'website', 'title','description'];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($post){
            $existingPost = self::where('website', $post->website)
                                ->where('title', $post->title) 
                                ->first();
            if($existingPost)    {
                throw new \Exception('Duplicate');
            }        
        });
    }
}

