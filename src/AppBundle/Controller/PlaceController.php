<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;
use AppBundle\Entity\Places;
use AppBundle\Entity\Characterlocation;


class PlaceController extends Controller
{

    /**
     * @Route("/place/{id}", name="places")
     */
    public function indexAction($id){

        $em = $this->getDoctrine()->getManager();

        $place = $em->getRepository("AppBundle:Places")->find($id);

        $functions = $em->getRepository("AppBundle:Functionsbyplace")->findBy([
            'placeid' => $place->getId(),
        ]);

        return $this->render('default/place.html.twig', [
            'place' => $place,
            'functions' => $functions,
        ]);
    }

    /**
     * @Route("/summon/{level}/{placeType}", name="summon")
     */
    public function summonAction($level, $placeType){

        $em = $this->getDoctrine()->getManager();

        $followers = $em->getRepository("AppBundle:Followers")->findBy([
            'levelMin' => $level,
            'type' => $placeType,
        ]);

        $summonTable = array();

        forEach($followers as $follower){
            for($i=0; $i< $follower->getPopRate(); $i++){
                $summonTable[] = $follower;
            }
        }

        shuffle($summonTable);

        $summonResult = array();

        for($i=0; $i < 10; $i++){
            $summonResult[] = $summonTable[$i];
        }

        return $this->render('default/summon.html.twig', [
            'summons' => $summonResult,
        ]);

    }

    /**
     * @Route("/quest/{level}", name="quest")
     */
    public function questAction($level){

        echo 'quêtes';
        die;
    }

    /**
     * @Route("/training/{level}", name="training")
     */
    public function trainingAction($level){

        echo 'entrainement';
        die;
    }

    /**
     * @Route("/craft/{level}", name="craft")
     */
    public function craftAction($level){

        echo 'artisanat';
        die;
    }

    /**
     * @Route("/sell/{level}", name="sell")
     */
    public function sellAction($level){

        echo 'ventes';
        die;
    }

    /**
     * @Route("/buy/{level}", name="buy")
     */
    public function buyAction($level){

        echo 'achats';
        die;
    }

    /**
     * @Route("/healing/{level}", name="healing")
     */
    public function healingAction($level){

        echo 'healing';
        die;
    }

    /**
     * @Route("/info/{level}", name="info")
     */
    public function infoAction($level){

        echo 'info';
        die;
    }


}