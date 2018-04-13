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

        $session = $this->get('session');

        $place = $em->getRepository("AppBundle:Places")->find($id);

        $session->set('place', $place);

        $functions = $em->getRepository("AppBundle:Functionsbyplace")->findBy([
            'placeid' => $place->getId(),
        ]);

        $session->set('functionsPlaces', $functions);


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

        $session = $this->get('session');

        $place = $session->get('place');

        $functionsPlaces = $session->get('functionsPlaces');

        foreach ($functionsPlaces as $function){
            if( $function->getFunctionid()->getTypefunction() === 1){
                $function = $function->getName();
                break;
            }
        }

        return $this->render('default/summons.html.twig', [
            'place' => $place,
            'function' => $function,
        ]);
    }

    /**
     * @Route("/summon/{level}/{placeType}/{summonType}", name="summons")
     */
    public function summonAction($level, $placeType, $summonType){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $character = $em->getRepository("AppBundle:Characters")->find($character->getId());

        $box = $character->getBoxSize();

        $amountMoney = $character->getGlory();

        if($summonType === "1"){
                $summonLabel = "Invocation simple";
            } else {
                $summonLabel = "Multi-Invocation";
            }

        $costSummon = 10 * $summonType;

        if ($amountMoney <= $costSummon) {

            $noMoney = "pas assez de Gloire";
            $summonResult = null;

        } else {

            $noMoney ="";
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
                $newFollower->setName($summonTable[$i]->getName());
                $newFollower->setType($summonTable[$i]->getType());
                $newFollower->setHealth($summonTable[$i]->getHealth());
                $newFollower->setMaxHealth($summonTable[$i]->getMaxHealth());
                $newFollower->setEnergy($summonTable[$i]->getEnergy());
                $newFollower->setMaxEnergy($summonTable[$i]->getMaxEnergy());
                $newFollower->setMove($summonTable[$i]->getMove());
                $newFollower->setQuickness($summonTable[$i]->getQuickness());
                $newFollower->setAttack($summonTable[$i]->getAttack());
                $newFollower->setDefense($summonTable[$i]->getDefense());
                $newFollower->setCritical($summonTable[$i]->getCritical());
                $newFollower->setLevel($summonTable[$i]->getLevel());
                $newFollower->setXp($summonTable[$i]->getXp());
                $newFollower->setImage($summonTable[$i]->getImage());
                $newFollower->setGoal($summonTable[$i]->getGoal());
                $newFollower->setUniqueRate($summonTable[$i]->getUniqueRate());
                $newFollower->setRateLabel($summonTable[$i]->getRateLabel());
                $newFollower->setPriceBack($summonTable[$i]->getPriceBack());
                $newFollower->setLaw($summonTable[$i]->getLaw());
                $newFollower->setChaos($summonTable[$i]->getChaos());
                $newFollower->setGood($summonTable[$i]->getGood());
                $newFollower->setEvil($summonTable[$i]->getEvil());
                $newFollower->setCharacterid($character);
                $newFollower->setFollowerid($summonTable[$i]);

                $em->persist($newFollower);
                $em->flush();
            }  

            $amountMoney = $amountMoney - $costSummon;

            $character->setGlory($amountMoney);

            $box = $box + $summonType;
            $character->setBoxSize($box);
            $em->persist($character);
            $em->flush();

            $session->set('character', $character);

        }

         return $this->render('default/summon.html.twig', [
            'summonTitle' => $summonLabel,
            'summons' => $summonResult,
            'amountMoney' => $amountMoney,
            'noMoney' => $noMoney,
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
    public function sellAction($placeId){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $place = $em->getRepository("AppBundle:Places")->find($placeId);

        $items = $em->getRepository('AppBundle:Items')->findBy([
            'level' => $place->getLevel(),
        ]);

        return $this->render('default/sell.html.twig', [
            'items' => $items,
            'character' => $character,
        ]);
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