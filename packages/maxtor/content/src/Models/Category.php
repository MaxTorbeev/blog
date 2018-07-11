<?php

namespace MaxTor\Content\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use MaxTor\Content\Models\Post;

class Category extends Model
{
    protected $table = 'posts_categories';

    use Sluggable;

    protected $guarded = [];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'cat_id');
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
