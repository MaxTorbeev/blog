<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;
use MaxTor\MXTCore\Traits\SetCreators;

class MenuType extends Model
{
    use SetCreators;

    protected $table = 'menu_types';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($menuType) {
            $menuType->menu->each->update(['menu_type_id' => 1]);
        });
    }

    public function menu()
    {
        return $this->hasMany(Menu::class, 'menu_type_id');
    }
}
