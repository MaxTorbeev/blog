<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $guarded = [];

    /**
     * Creating a URL path from the router or url attributes.
     *
     * @return mixed|string
     */
    public function getUrlPathAttribute()
    {
        if($this->url !== null){
            return $this->url;
        } else {
            try{
                $this->url = route($this->route_name, json_decode($this->getOriginal('params'), true), false);
            } catch (\Exception $e){
                $this->url = $e->getMessage();
            }
        }

        return $this->url;
    }

    public function setParamsAttribute($value)
    {
        $this->attributes['params'] = json_encode($value);
    }

    public function getParamsAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Menu type by menu item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuType()
    {
        return $this->belongsTo('MaxTor\MXTCore\Models\MenuType', 'menu_type_id');
    }

    public function parent()
    {
        return $this->belongsTo('MaxTor\MXTCore\Models\Menu', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('MaxTor\MXTCore\Models\Menu', 'parent_id');
    }
}
