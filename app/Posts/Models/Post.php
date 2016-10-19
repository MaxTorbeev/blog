<?php

namespace App\Posts\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * A post is composed of many photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Posts\Models\Photo');
    }
}
