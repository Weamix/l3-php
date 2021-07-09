<?php

namespace App\Controller;

use App\Entity\Bet;
use App\Repository\BetRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RanksController extends ScoreController
{
    /**
     * @Route("/ranks", name="ranks")
     * @param UserRepository $userRepository
     * @param BetRepository $betRepository
     * @return void
     */
    public function index(UserRepository $userRepository, BetRepository $betRepository ): Response
    {
        $users = $userRepository->findAll();
        $matchs = $betRepository->getAllMatchsFromJson();

        $ranks = $this ->getAllScores($matchs,$users,$betRepository);

        return $this->render('ranks/index.html.twig', [
            'controller_name' => 'RanksController',
            'ranks' => $ranks
        ]);
    }
}
