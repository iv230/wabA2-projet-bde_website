<?php


namespace App;


abstract class APIBaseModel
{
    function hydrate($class, $values) {
        $model = new $class();

        $objectsGetter = function($object) {
            return get_object_vars($object);
        };

        $attributes = \Closure::bind($objectsGetter, null, $model)($model);

        foreach($attributes as $attribute => $value) {
            $model->$attribute = $values->$attribute;
        }

        return $model;
    }
}
