<?php
namespace App\Framework;

class App {
    protected static $registry = [];

    public static function bind($name, $dependency){
        static::$registry[$name] = $dependency;
    }

    public static function get($name){
        return static::$registry[$name];
    }
}