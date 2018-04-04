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

        $team = $session->get('team');

        $balance = $session->get('balance');
        if($balance == null){
            $balance = $character->getLaw() - $character->getChaos();
            $session->set('balance', $balance);
        }
        $goodness = $session->get('goodness');
        if($goodness == null){
            $goodness = $character->getGood() - $character->getEvil();
            $session->set('goodness', $goodness);
        }


        $teamFinal = array();
        for($i=1; $i <=5; $i++){
            $teamFinal[$i] = false;
        }
        if(!empty($team)){
            $teamFinal = $team;
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
}