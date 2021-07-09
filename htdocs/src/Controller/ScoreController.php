<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    public function getScoreByUser($matchs, $bets){
        $points = 0;

        foreach ($matchs as $key=>$match){
            foreach ($bets as $bet){
                if($key == $bet->getIdMatch()){
                    $counter_match = 0;
                    if(isset($match['scores'])){

                        $scores = $match['scores'];
                        $score_match_ext  = $scores["exterieur"];
                        $score_match_dom  = $scores["domicile"];
                        $prono_match_ext  = $bet->getScoreExterieur();
                        $prono_match_dom = $bet->getScoreDomicile();

                        $match_winner = $score_match_dom > $score_match_ext ? "domicile" : "exterieur";
                        $prono_match_winner = $prono_match_dom > $prono_match_ext ? "domicile" : "exterieur";

                        if($match_winner == $prono_match_winner ){
                            $counter_match = 1;
                            if($prono_match_ext == $score_match_ext && $prono_match_dom == $score_match_dom ){
                                $counter_match = 3;
                            }
                        }
                    }
                    $points += $counter_match;
                }
            }
        }
        return $points;
    }

    public function getAllScores($matchs,$users,$betRepository){
        $ranks = [];

        foreach ($users as $user){
            $bets = $betRepository->findBy(['idUser'=>$user->getId()]);

            $points = $this->getScoreByUser($matchs,$bets);

            $rank = [$points, $user->getEmail()];
            array_push($ranks,$rank);
            rsort($ranks);
        }

        return $ranks;
    }
}
