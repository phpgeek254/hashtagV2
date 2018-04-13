<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    //
    protected $fillable = ['image_path', 'thumbnail_path'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
