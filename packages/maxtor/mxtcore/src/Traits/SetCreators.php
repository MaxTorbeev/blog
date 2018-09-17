<?php

namespace MaxTor\MXTCore\Traits;

/**
 * Trait SetCreators.
 *
 * Заполняем поля id пользователя создателя и пользователя модификатора
 *
 * @package MaxTor\MXTCore\Traits
 */
trait SetCreators
{
    protected static function bootSetCreators()
    {
        static::creating(function ($model) {
            if(property_exists($model, 'created_by_user_id')){
                $model->created_by_user_id = auth()->user()->id;
            }
        });

        static::updating(function ($model) {
            if(property_exists($model, 'modified_by_user_id')){
                $model->modify_user_id = auth()->user()->id;
            }
        });
    }
}