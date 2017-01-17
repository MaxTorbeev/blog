<?php

namespace MaxTor\Blog\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Fillable fileds for a tag.
     * @var array
     */
    protected $fillable = [
        'name',
        'alias',
        'description',
        'user_id',
    ];


    public function scopeCreated($query)
    {
        $query->where('created_at', '<=', Carbon::now());
    }

    /**
     * An post is owned by a user
     *
     * Передаем user_id  в базу данных при создании статьи
     * Использование: $article->user()
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the articles associated with the give tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('MaxTor\Blog\Models\Post')->withTimestamps();
    }
}
