<?php


class Autoload
{
    static function  register(){
        spl_autoload_register(function ($class){
            // TODO name space read
            var_dump($class);
            require_once($class.".php");
    });
    }
}

//autoloader fonctionnel avec les namespaces