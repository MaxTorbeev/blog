<?php

namespace App\Posts\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Fillable fileds for a tag.
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    public function scopeCreated($query)
    {
        $query->where('created_at', '<=', Carbon::now());
    }

    /**
     * Get the articles associated with the give tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Posts\Models\Post')->withTimestamps();
    }
}
