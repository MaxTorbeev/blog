<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $table = 'extensions';

    protected $fillable = [
        'name',
        'namespace',
        'original_name'
    ];

    public function getTypeByMenuAlias()
    {
        return $this->belongsTo('MaxTor\MXTCore\Models\Menu', 'alias');
    }
}
