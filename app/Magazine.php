<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    //
    protected $fillable = ['magazine_name'];
    public function pages()
    {
        return $this->hasMany(MagazinePage::class);
    }
}
