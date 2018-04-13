<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $post_content
 * @property \Carbon\Carbon $created_at
 * @property int $id
 */
class Post extends Model
{
    //
    protected $fillable = ['user_id', 'title', 'post_content'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }


    public function getPostContentAttribute($value) {
        return preg_replace('/<!--\s*\[if[^\]]*]>.*?<!\[endif\]-->/i', "", $value);
    }

}
