<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
