<?php

namespace App\Controller;

use App\Entity\Bet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     * @param UserInterface $user
     * @return Response
     */
    public function index(UserInterface $user): Response
    {

        $betRepository = $this->getDoctrine()->getRepository(Bet::class);
        $userId = $user->getId();
        $bets = $betRepository->findBy(['idUser'=>$userId]);

        $json = file_get_contents('../matchs.json');
        $matchs = json_decode($json,true);


        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'bets' => $bets,
            'matchs' => $matchs
        ]);
    }
}
