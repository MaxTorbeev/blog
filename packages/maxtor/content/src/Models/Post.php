<?php

namespace MaxTor\Content\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use MaxTor\Content\Traits\RecordsPhoto;

class Post extends Model
{
    use RecordsPhoto;

    /**
     * Fillable fields for a post
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'intro_text',
        'full_text',
        'cat_id',
        'preview_photo_id',
        'created_user_id',

        'metakey',
        'metadesc',
        'metadata',

        'published',
        'published_at'
    ];

    /**
     * Additional fields to treat as Carbon instances
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('published_at', function (Builder $builder) {

            if( Auth::user() ){
                $builder->where('published_at', '<=', Carbon::now());
            } else {
                $builder->where('published_at', '<=', Carbon::now())->where('published', '=', 1);
            }

        });
    }

    public function setAliasAttribute($alias)
    {
        $this->attributes['alias'] = str_replace(' ', '-', $alias);
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
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

    /**
     * Preview image
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function previewImage()
    {
        return $this->hasOne(Photo::class, 'id', 'preview_photo_id');
    }

    /**
     * A post is composed of many photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'subject_id');
    }

    /**
     * Get the tags associated with the give post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id')->withTimestamps();
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
        return $this->belongsTo(User::class, 'created_user_id');
    }
}
