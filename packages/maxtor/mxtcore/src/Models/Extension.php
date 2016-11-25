<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $table = 'extensions';

    protected $fillable = [
        'name',
        'controller_path',
        'created_user_id',
        'enabled',
    ];

    public function getTypeByMenuAlias()
    {
        return $this->belongsTo('MaxTor\MXTCore\Models\Menu', 'alias');
    }
    
    public function controllerName()
    {
        $controllerPath = explode('\\', $this->controller_path);
        
        return end($controllerPath);
    }
}
