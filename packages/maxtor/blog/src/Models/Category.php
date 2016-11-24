<?php

namespace MaxTor\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'posts_categories';

    protected $fillable = [
        'level',
        'parent_id',

        'title',
        'alias',
        'description',
        'note',

        'metakey',
        'metadesc',
        'metadata',

        'hits',
        'state',
    ];

    public function posts()
    {
        return $this->hasMany('MaxTor\Blog\Models\Post', 'cat_id');
    }

    public function parent()
    {
        return $this->belongsTo('MaxTor\Blog\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Models\Category', 'parent_id');
    }

    /**
     * An post is owned by a user
     *
     * Передаем user_id  в базу данных при создании статьи
     * Использование: $post->user()
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'created_user_id');
    }
}
