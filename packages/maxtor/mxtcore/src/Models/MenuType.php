<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    protected $table = 'menu_type';

    protected $guarded = [];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'menu_type_id');
    }
}
