<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    protected $table = 'menu_type';

    protected $fillable = [
        'menu_type',
        'title',
        'description'
    ];

    public function menu()
    {
        return $this->hasMany('MaxTor\MXTCore\Models\Menu', 'menu_type_id');
    }
}
