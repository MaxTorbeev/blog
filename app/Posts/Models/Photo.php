<?php

namespace App\Posts\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'post_photos';

    protected $fillable = [
        'filename',
        'path'
    ];

    public function posts()
    {
        return $this->belongsTo('App\Posts\Models\Post');
    }
}
