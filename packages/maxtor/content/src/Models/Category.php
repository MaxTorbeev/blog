<?php

namespace MaxTor\Content\Models;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use MaxTor\Content\Models\Post;
use MaxTor\MXTCore\Traits\Cacheable;
use MaxTor\MXTCore\Traits\SetCreators;

class Category extends Model
{
    use Sluggable, Cacheable, SetCreators;

    public $cacheKeys = [];

    protected $table = 'posts_categories';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->created_user_id = auth()->user()->id;
        });
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Set null in DB if $value equal zero
     *
     * @param $value
     */
    public function setParentIdAttribute($value)
    {
        $this->attributes['parent_id'] = ($value == 0) ? null : $value;
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'cat_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
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
        return $this->belongsTo(User::class, 'created_user_id');
    }
}
