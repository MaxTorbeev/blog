<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    protected $table = 'menu_types';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($menuType) {
            $menuType->menu->each->update(['menu_type_id' => 0]);
        });
    }

    public function menu()
    {
        return $this->hasMany(Menu::class, 'menu_type_id');
    }
}
