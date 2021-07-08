<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RanksController extends AbstractController
{
    /**
     * @Route("/ranks", name="ranks")
     */
    public function index(): Response
    {
        return $this->render('ranks/index.html.twig', [
            'controller_name' => 'RanksController',
        ]);
    }
}
