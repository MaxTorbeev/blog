<?php

namespace App;

use MaxTor\Content\Models\Post;
use MaxTor\MXTCore\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function owns($related)
    {
        return $this->id == $related->created_by_user_id;
    }

    /**
     * A user can have many posts
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by_user_id');
    }

    /**
     * A user can have many categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Post::class, 'created_by_user_id');
    }

    /**
     * A user can have many posts
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extensions()
    {
        return $this->hasMany('MaxTor\MXTCore\Models\Extension', 'created_by_user_id');
    }

    /**
     * A user can have many tags
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Tag::class, 'created_by_user_id');
    }

}
