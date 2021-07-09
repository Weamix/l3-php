<?php

namespace App\Controller;

use App\Entity\Bet;
use App\Repository\BetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     * @param UserInterface $user
     * @param BetRepository $betRepository
     * @return Response
     */
    public function index(UserInterface $user, BetRepository $betRepository): Response
    {
        $betRepository = $this->getDoctrine()->getRepository(Bet::class);
        $userId = $user->getId();
        $bets = $betRepository->findBy(['idUser'=>$userId]);

        //$json = file_get_contents('../matchs.json');
        //$matchs = json_decode($json,true);

        $matchs = $betRepository->getAllMatchsFromJson();
        $points = 0;

        foreach ($matchs as $key=>$match){
            foreach ($bets as $bet){
                if($key == $bet->getIdMatch()){
                    $counter_match = 0;
                    if(isset($match['scores'])){

                        //dd($matchs);
                        $scores = $match['scores'];
                        $score_match_ext  = $scores["exterieur"];
                        $score_match_dom  = $scores["domicile"];
                        $prono_match_ext  = $bet->getScoreExterieur();
                        $prono_match_dom = $bet->getScoreDomicile();

                        $match_winner = $score_match_dom > $score_match_ext ? "domicile" : "exterieur";
                        $prono_match_winner = $prono_match_dom > $prono_match_ext ? "domicile" : "exterieur";
                        /*if($scores["tireaubut"] != null){
                            $winner_tir_aux_buts = $scores["winner"];
                        }*/

                        if($match_winner == $prono_match_winner ){
                            $counter_match = 1;
                            /*if($score_match_ext == $score_match_dom && $prono_match_ext == $prono_match_dom && $winner_tir_aux_buts == $prono_match_winner){
                                $counter_match = 1;
                            }*/
                            if($prono_match_ext == $score_match_ext && $prono_match_dom == $score_match_dom ){
                                $counter_match = 3;
                            }
                        }
                    }
                    $points += $counter_match;
                }
            }
        }

        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'bets' => $bets,
            'matchs' => $matchs,
            'points' => $points
        ]);
    }
}
