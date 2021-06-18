<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render("home.html.twig");
    }
}