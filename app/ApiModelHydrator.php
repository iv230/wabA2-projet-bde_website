<?php


namespace App;


abstract class ApiModelHydrator
{
    static function hydrate($class, $values)
    {
        $model = new $class();

        $objectsGetter = function($object)
        {
            return get_object_vars($object);
        };

        $attributes = \Closure::bind($objectsGetter, null, $model)($model);
 
        foreach($attributes as $attribute => $value)  {
            $model->$attribute = $values->$attribute;
        }

        return $model;
    }

    static function hydrateAll($class, $values)
    {
        $models = [];

        foreach($values as $set)
        {
            $models[] = self::hydrate($class, $set);
        }

        return $models;
    }
}
