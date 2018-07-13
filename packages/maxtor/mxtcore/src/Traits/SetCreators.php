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
            $model->created_user_id = auth()->user()->id;
        });

        static::updating(function ($model) {
            $model->modify_user_id = auth()->user()->id;
        });
    }
}