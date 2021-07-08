<?php

namespace App\Controller;

use App\Entity\Bet;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BetController extends AbstractController
{
    /**
     * @Route("/bet", name="bet",methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {

        $score1 = $request->get("form")["score1"];
        $score2 = $request->get("form")["score2"];

        $entityManager = $this->getDoctrine()->getManager();

        $bet = new Bet();

        $bet->setIdMatch(1);
        $bet->setIdUser(1);
        $bet->setScoreDomicile(1);
        $bet->setScoreExterieur(1);
        $entityManager->persist($bet);
        $entityManager->flush();

        return $this->redirectToRoute('home');


        /*return $this->render('bet/index.html.twig', [
            'controller_name' => 'BetController',
        ]);*/
    }

}
