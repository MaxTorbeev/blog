<?php

namespace MaxTor\Blog\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        'preview_photo_id',
        'published',
        'published_at'
    ];

    /**
     * Additional fields to treat as Carbon instances
     *
     * @var array
     */
    protected $dates = ['published_at'];

    public function setAliasAttribute($alias)
    {
        $this->attributes['alias'] = str_replace(' ', '-', $alias);
    }

    /**
     * scopeFunction name
     *
     * Возможно использование Article::published()->get()
     * @param $query
     * @return bool
     */

    public function scopePublished($query)
    {
        if(!Auth::user()){
            return $query->where('published_at', '<=', Carbon::now())->where('published', '=', 1);
        }
        return $query->where('published_at', '<=', Carbon::now());
    }

    /** Set the published_at attribite
     *
     *  @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
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
     * Preview image
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function previewImage()
    {
        return $this->hasOne('MaxTor\Blog\Models\Photo', 'id', 'preview_photo_id');
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
     * Get the tags associated with the give post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('MaxTor\Blog\Models\Tag')->withTimestamps();
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
