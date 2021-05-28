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
        var_dump($uri);

        $json = file_get_contents("routes.json");
        $routes = json_decode($json, true);
        $controller=null;

        foreach ($routes as $route){
                if($uri == $route['path']){
                    $controller = "App\Controller\\".$route['controller'];
                } else{
                    echo "404";
                    header("HTTP/1.0 404 Not Found");
                    http_response_code(404);
                }
            }

            list($controllerObject, $method) = explode("@", $controller);
            return call_user_func_array([$controllerObject, $method], []);
        }

}