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

        $user = $em->getRepository('AppBundle:Users')->find(1);

        $character = $em->getRepository('AppBundle:Characters')->findBy([
            'userid' => $user->getId(),
        ]);

        $capacities = $em->getRepository('AppBundle:Capacitiesbycharacter')->findBy([
            'characterid' => $character[0]->getId(),
        ]);

        //echo '<pre>'.print_r($capacities, true).'</pre>';

        $characterCapacities = [];
        $x=0;
        while(isset($capacities[$x])){
            $characterCapacities[] = $em->getRepository('AppBundle:Capacities')->find(
                $capacities[$x]->getCapacityid()
            );
            $x++;
        }

        //echo '<pre>'.print_r($characterCapacities, true).'</pre>';

        $map = $em->getRepository('AppBundle:Map')->find($character[0]->getLocation());

        $places = $em->getRepository('AppBundle:Placesbymap')->findBy([
            'mapid' => $map->getId(),
        ]);

        //echo '<pre>'.print_r($places, true).'</pre>';

        $placesByMap = [];
        $x=0;
        while(isset($places[$x])){
            $placesByMap[] = $em->getRepository('AppBundle:Places')->find(
                $places[$x]->getPlaceid()
            );
            $x++;
        }

        return $this->render('default/playerPage.html.twig', [
            'character' => $character[0],
            'map' => $map,
            'capacities' => $characterCapacities,
            'places' => $placesByMap,
        ]);
    }
}