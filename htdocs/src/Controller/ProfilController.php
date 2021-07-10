<?php

namespace App\Controller;

use App\Entity\Bet;
use App\Repository\BetRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfilController extends ScoreController
{
    /**
     * @Route("/profil", name="profil")
     * @param UserInterface $user
     * @param BetRepository $betRepository
     * @param UserRepository $userRepository
     * @return Response
     */
    public function index(UserInterface $user, BetRepository $betRepository, UserRepository $userRepository): Response
    {
        $betRepository = $this->getDoctrine()->getRepository(Bet::class);
        $userId = $user->getId();
        $bets = $betRepository->findBy(['idUser'=>$userId]);

        $matchs = $betRepository->getAllMatchsFromJson();

        $points = $this ->getScoreByUser($matchs,$bets);

        $users = $userRepository->findAll();

        $ranks = $this ->getAllScores($matchs,$users,$betRepository);

        $rankProfil = $this->getRankByProfil($ranks,$user);

        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'bets' => $bets,
            'matchs' => $matchs,
            'points' => $points,
            'rankProfil' => $rankProfil
        ]);
    }

    public function getRankByProfil($ranks, $user){
        $rank = 1;
        $i = 0;
        $userEmail = $user->getEmail();
        do{
            if($ranks[$i][1] == $userEmail){
                $rank = $i + 1;
            }
            $i++;
        }while($i != sizeof($ranks));
        return $rank;
    }

}
