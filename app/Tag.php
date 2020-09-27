<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
