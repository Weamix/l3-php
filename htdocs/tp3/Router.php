<?php

class Router{
    function process(){
        /*
            ex http://localhost/
            $uri = /

            ex http://localhost/catalog
            $uri = /catalog

            ex http://localhost/catalog
            $uri = /catalog/product

            1) récup uri
            2) mapping entre $uri et routes.json : prévoir route non connue => 404
            3) instance controller de la route avec appel de la méthode
        */

        $uri = $_SERVER['REQUEST_URI'];
        //var_dump($uri);

        $json = file_get_contents("routes.json");
        $routes = json_decode($json, true);
        $controllerAll="";

        foreach ($routes as $route){
                if($uri == $route['path']){
                    $controllerAll = "App\Controller\\".$route['controller'];
                    break;
                } else{
                    echo "404";
                    http_response_code(404);die;
                }
            }

            //return call_user_func_array([$controllerObject, $method], []);

            list($controllerObject, $method) = explode("@", $controllerAll);
            echo (new $controllerObject())->{$method}();
        }
}

