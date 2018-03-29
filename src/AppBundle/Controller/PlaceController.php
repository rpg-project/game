<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;
use AppBundle\Entity\Places;
use AppBundle\Entity\Characterlocation;
use AppBundle\Entity\Followersbycharacter;


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
     * @Route("/summonPlace/{placeId}", name="summon")
     */
    public function summonPlaceAction($placeId)
    {
        $em = $this->getDoctrine()->getManager();

        $place = $em->getRepository("AppBundle:Places")->find($placeId);

        return $this->render('default/summons.html.twig', [
            'place' => $place,
        ]);
    }

    /**
     * @Route("/summon/{level}/{placeType}/{summonType}", name="summons")
     */
    public function summonAction($level, $placeType, $summonType){

        $em = $this->getDoctrine()->getManager();

        $character = $em->getRepository("AppBundle:Characters")->find(24);

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

        for($i=0; $i < $summonType; $i++){
            $summonResult[] = $summonTable[$i];
            $newFollower = new Followersbycharacter();
            $newFollower->setTeamed(0);
            $newFollower->setCharacterid($character);
            $newFollower->setFollowerid($summonTable[$i]);

            $em->persist($newFollower);
            $em->flush();
        }

        if($summonType === "1"){
            $summonLabel = "Invocation simple";
        } else {
            $summonLabel = "Multi-Invocation";
        }

        return $this->render('default/summon.html.twig', [
            'summonTitle' => $summonLabel,
            'summons' => $summonResult,
        ]);

    }

    /**
     * @Route("/quest/{placeId}", name="quest")
     */
    public function questAction($level){

        echo 'quêtes';
        die;
    }

    /**
     * @Route("/training/{placeId}", name="training")
     */
    public function trainingAction($level){

        echo 'entrainement';
        die;
    }

    /**
     * @Route("/craft/{placeId}", name="craft")
     */
    public function craftAction($level){

        echo 'artisanat';
        die;
    }

    /**
     * @Route("/sell/{placeId}", name="sell")
     */
    public function sellAction($level){

        echo 'ventes';
        die;
    }

    /**
     * @Route("/buy/{placeId}", name="buy")
     */
    public function buyAction($level){

        echo 'achats';
        die;
    }

    /**
     * @Route("/healing/{placeId}", name="healing")
     */
    public function healingAction($level){

        echo 'healing';
        die;
    }

    /**
     * @Route("/info/{placeId}", name="info")
     */
    public function infoAction($level){

        echo 'info';
        die;
    }


}