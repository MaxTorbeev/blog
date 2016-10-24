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
        $alias = str_replace('-', ' ', $alias);

        return $query->where(compact('alias'));
    }

    /**
     * A post is composed of many photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Posts\Models\Photo');
    }

    /**
     * An article is owned by a user
     *
     * Передаем user_id  в базу данных при создании статьи
     * Использование: $article->user()
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
