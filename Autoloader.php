<?php

namespace Blog;

class Autoloader
{
    // static function cause we don't need to instantitate them
    static function register()
    {
        // call a function inside a class => array
        // dynamic const __CLASS__ / function auloload
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
//        var_dump($class);
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }
}
