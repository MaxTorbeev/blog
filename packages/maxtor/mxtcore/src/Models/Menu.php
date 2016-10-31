<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'title',
        'alias',
        'extensions_id'
    ];

    /**
     * Menu type by menu item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuType()
    {
        return $this->belongsTo('MaxTor\MXTCore\Models\MenuType', 'menu_type_id');
    }

    /**
     * Menu type by menu item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function extension()
    {
        return $this->belongsTo('MaxTor\MXTCore\Models\Extension', 'extensions_id');
    }

    public function parent()
    {
        return $this->belongsTo('MaxTor\MXTCore\Models\Menu', 'parent_id');
    }
}
