<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = ['gallery_name'];
    public function images()
    {
        return $this->hasMany(images::class)->orderByDesc('created_at');
    }
}
