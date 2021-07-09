<?php

namespace App\Controller;

use App\Entity\Bet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class BetController extends AbstractController
{
    /**
     * @Route("/bet", name="bet",methods={"POST"})
     * @param Request $request
     * @param UserInterface $user
     * @return Response
     */
    public function index(Request $request, UserInterface $user): Response
    {

        $scoreExterieur = $request->request->get("scoreExterieur");
        $scoreDomicile = $request->request->get("scoreDomicile");
        $matchId = $request->request->get("matchId");

        //$data = $request->request->all();

        $userId = $user->getId();

        $entityManager = $this->getDoctrine()->getManager();

        $bet = new Bet();

        $bet->setIdMatch($matchId);
        $bet->setIdUser($userId);
        $bet->setScoreDomicile($scoreDomicile);
        $bet->setScoreExterieur($scoreExterieur);
        $entityManager->persist($bet);
        $entityManager->flush();

        return $this->redirectToRoute('profil');
    }

}
