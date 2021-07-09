<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MatchsController extends AbstractController
{
    /**
     * @Route("/matchs", name="match")
     */
    public function index(): Response
    {
        $json = file_get_contents('../matchs.json');
        $matchs = json_decode($json,true);

        //dd($matchs);

        return $this->render('matchs/index.html.twig', ['matchs' => $matchs]);
    }
}
