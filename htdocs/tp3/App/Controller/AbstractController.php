<?php


namespace App\Controller;


abstract class AbstractController
{
    const TEMPLATE_PATH = "templates/";

    public function render(String $templateName, array $args = []){
        extract($args);
        include_once(self::TEMPLATE_PATH . $templateName);
    }
}