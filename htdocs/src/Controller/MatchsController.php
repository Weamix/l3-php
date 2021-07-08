<?php

namespace App\Controller;

use http\Client;
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
        //$client = new Client();
        //$response = $client->request('GET', '../matchs.json');

        $json = file_get_contents('../matchs.json');
        $matchs = json_decode($json,true);

        //dd($matchs);

        return $this->render('matchs/index.html.twig', ['matchs' => $matchs]);
    }
}
