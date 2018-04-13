<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'venue', 'start_date', 'start_time', 'end_date', 'end_time'];
    //
    public function event_images()
    {
        return $this->hasMany(EventImage::class);
    }
}
