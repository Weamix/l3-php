<?php

namespace App\Controller;

class HomeController extends AbstractController
{

    public function home()
    {
        //echo "Hello, welcome at home !";
        echo $this->render('home.phtml', []);

    }
}