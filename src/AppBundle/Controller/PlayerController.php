<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;
use AppBundle\Entity\Players;
use AppBundle\Entity\Characterlocation;


class PlayerController extends Controller
{
    /**
     * @Route("/player", name="player_homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $user = $session->get('user');

        $character = $em->getRepository('AppBundle:Characters')->findBy([
            'userid' => $user->getId(),
        ]);

        $session->set('character', $character[0]);


        $character = $session->get('character');

        $capacities = $em->getRepository('AppBundle:Capacitiesbycharacter')->findBy([
            'characterid' => $character->getId(),
        ]);

        $characterCapacities = [];
        $x=0;
        while(isset($capacities[$x])){
            $characterCapacities[] = $em->getRepository('AppBundle:Capacities')->find(
                $capacities[$x]->getCapacityid()
            );
            $x++;
        }

        $team = $em->getRepository('AppBundle:Team')->findBy([
            'characterId' => $character->getId(),
        ]);

        $balance = $character->getLaw() - $character->getChaos();
        $session->set('balance', $balance);
        $goodness = $character->getGood() - $character->getEvil();
        $session->set('goodness', $goodness);
        $session->set('gold', $character->getGold());

        $teamFinal = array();
        for($i=1; $i <=5; $i++){
            $teamFinal[$i]['mate'] = false;
        }
        $goldMin = 0;
        if(!empty($team)){
            foreach ($team as $mate){
                $place = $mate->getPlace();
                $follower = $em->getRepository('AppBundle:Followersbycharacter')->findBy([
                    'id' => $mate->getTeamMateId(),
                ]);
                $teamFinal[$place]['mate'] = $follower[0];
                if($follower[0]->getGoal() == 3){
                    $goldMin += $follower[0]->getLevel() * $follower[0]->getFollowerid()->getLevelMin();
                    $session->set('goldMin', $goldMin);
                }
                $teamFinal[$place]['avalaible'] = $this->goal($follower[0]->getGoal());
                if($teamFinal[$place]['avalaible'] == false){
                    $mate->setAvalaible(1);
                } else {
                    $mate->setAvalaible(0);
                }
                $em->persist($mate);
                $em->flush();
                $balance += $follower[0]->getLaw() - $follower[0]->getChaos();
                $goodness += $follower[0]->getGood() - $follower[0]->getEvil();
            }
        }

        $map = $em->getRepository('AppBundle:Map')->find($character->getLocation());

        $places = $em->getRepository('AppBundle:Placesbymap')->findBy([
            'mapid' => $map->getId(),
        ]);

        $placesByMap = [];
        $x=0;
        while(isset($places[$x])){
            $placesByMap[] = $em->getRepository('AppBundle:Places')->find(
                $places[$x]->getPlaceid()
            );
            $x++;
        }

        return $this->render('default/playerPage.html.twig', [
            'character' => $character,
            'map' => $map,
            'capacities' => $characterCapacities,
            'places' => $placesByMap,
            'team' => $teamFinal,
            'balance' => $balance,
            'goodness' => $goodness,
        ]);
    }

    /**
     * @Route("/stats_player", name="stats_player")
     */
    public function statsAction(){
        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        return $this->render('default/stats.html.twig', [
            'stats' => $character,
        ]);
    }

    /**
     *  Tester le but du follower pour voir la compatibilité avec le perso et la team
     */
    public function goal($goal){

        $session = $this->get('session');

        $balanceTeam = $session->get('balanceTeam');
        $goodnessTeam = $session->get('goodnessTeam');
        $balance = $session->get('balance');
        $goodness = $session->get('goodness');
        $gold = $session->get('gold');
        $goldMin = $session->get('goldMin');

        switch($goal){
            case 1 : if($balanceTeam < 0 || $balance < 0){
                        return false;
                    } else {
                        return true;
                    }
                    break;
            case 2 : if($balanceTeam < 0 || $balance < 0 || $goodnessTeam < 0 || $goodness < 0){
                        return false;
                    } else {
                        return true;
                    }
                    break;
            case 3 : if($gold < $goldMin){
                        return false;
                    } else {
                        return true;
                    }
                    break;
            case 4 : if($balanceTeam > 0 || $balance > 0){
                        return false;
                    } else {
                        return true;
                    }
                    break;
            case 999: return false;
            Default : $available = true;
        }

        return $available;
    }
}