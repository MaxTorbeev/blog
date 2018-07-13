<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($menu) {
            $menu->children->each->update(['parent_id' => 0]);
        });
    }

    /**
     * Creating a URL path from the router or url attributes.
     *
     * @return mixed|string
     */
    public function getUrlPathAttribute()
    {
        if ($this->url !== null) {
            return $this->url;
        } else {
            try {
                $this->url = route($this->route_name, json_decode($this->getOriginal('params'), true), false);
            } catch (\Exception $e) {
                $this->url = null;
            }
        }

        return $this->url;
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

    public function setParamsAttribute($value)
    {
        $this->attributes['params'] = json_encode($value);
    }

    public function getParamsAttribute($value)
    {
        return json_decode($value);
    }

    public static function routesList($selectedMiddleware = 'web')
    {
        $routesList = null;

        foreach (app()->routes->getRoutes() as $routes) {
            $middleware = is_array($routes->getAction()['middleware']) ? $routes->getAction()['middleware'][0]
                                                                       : $routes->getAction()['middleware'];

            if ($selectedMiddleware === $middleware) {
                $routesList[$routes->getName()] = [
                    'uri' => $routes->uri(),
                    'action' =>$routes->getAction()
                ];
            }
        }

        return $routesList;
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
