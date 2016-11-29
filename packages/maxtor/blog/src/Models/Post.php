<?php

namespace MaxTor\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Fillable fields for a post
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'alias',
        'intro_text',
        'full_text',
        'cat_id',
        'published'
    ];

    public function setAliasAttribute($alias)
    {
        $this->attributes['alias'] = str_replace(' ', '-', $alias);
    }

    /**
     * Scope query to those located at a given alias
     *
     * @param $query
     * @param $alias
     * @return mixed
     */
    public function scopeLocatedAt($query, $alias)
    {
        $alias = rusToLat(str_replace('-', ' ', $alias));

        return $query->where(compact('alias'));
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    public function category()
    {
        return $this->hasOne('MaxTor\Blog\Models\Category', 'id', 'cat_id');
    }

    /**
     * A post is composed of many photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('MaxTor\Blog\Models\Photo');
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
        return $this->belongsTo('App\User', 'created_user_id');
    }
}
