<?php

namespace MaxTor\MXTCore\Traits;

trait Cacheable
{
    public $cacheKeys = [];

    protected static function bootCacheable()
    {
        foreach (static::getSectionsToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->clearCache();
            });
        }
    }

    protected static function getSectionsToRecord()
    {
        return ['creating', 'updating', 'deleting'];
    }

    protected function clearCache()
    {
        foreach ($this->cacheKeys as $key){
            \Cache::forget($key);
        }
    }
}