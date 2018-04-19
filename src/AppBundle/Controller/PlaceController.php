<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Itemsbycharacter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;
use AppBundle\Entity\Places;
use AppBundle\Entity\Characterlocation;
use AppBundle\Entity\Followersbycharacter;
use AppBundle\Entity\Itemsbyfollowers;


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

        if ($amountMoney < $costSummon) {

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
                $newFollower->setMaxCapacityBag($summonTable[$i]->getMaxCapacityBag());
                $newFollower->setCharacterid($character);
                $newFollower->setFollowerid($summonTable[$i]);

                $em->persist($newFollower);
                $em->flush();

                $items = $em->getRepository('AppBundle:Followersitems')->findBy([
                    'followersid' => $summonTable[$i],
                ]);

                foreach ($items as $item){
                    $newItem = new Itemsbyfollowers();
                    $newItem->setEquiped(0);
                    $newItem->setContained(1);
                    $newItem->setContainerid($item->getItemid()->getContainer());
                    $newItem->setContainerSpace($item->getItemid()->getContainerSpace());
                    $newItem->setImage($item->getItemid()->getImage());
                    $newItem->setName($item->getItemid()->getName());
                    $newItem->setType($item->getItemid()->getType());
                    $newItem->setLevel($item->getItemid()->getLevel());
                    $newItem->setLevelMin($item->getItemid()->getLevelMin());
                    $newItem->setQuality($item->getItemid()->getQuality());
                    $newItem->setBonusMove($item->getItemid()->getBonusMove());
                    $newItem->setBonusQuickness($item->getItemid()->getBonusQuickness());
                    $newItem->setBonusAttack($item->getItemid()->getBonusAttack());
                    $newItem->setBonusDefense($item->getItemid()->getBonusDefense());
                    $newItem->setBonusCritical($item->getItemid()->getBonusCritical());
                    $newItem->setBonusHealth($item->getItemid()->getBonusHealth());
                    $newItem->setBonusEnergy($item->getItemid()->getBonusEnergy());
                    $newItem->setCapacity($item->getItemid()->getCapacity());
                    $newItem->setPriceBuy(0);
                    $newItem->setPriceSell($item->getItemid()->getPriceSell());
                    $newItem->setImage($item->getItemid()->getImage());
                    $newItem->setOpen($item->getItemid()->getOpen());
                    $newItem->setWeigth($item->getItemid()->getWeigth());
                    $newItem->setItemid($item->getItemid());
                    $newItem->setFollowerid($newFollower);
                    $newItem->setCharacterid($character);

                    $em->persist($newItem);
                    $em->flush();

                }
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

        $session->set('items', $items);

        return $this->render('default/sell.html.twig', [
            'items' => $items,
            'character' => $character,
        ]);
    }

    /**
     * @Route("/sell/item/{id}", name="sell_item")
     */
    public function sellItemAction($id){
        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $items = $session->get('items');

        $character = $em->getRepository('AppBundle:Characters')->findOneBy([
            'id'=>$character->getId(),
        ]);

        $item = $em->getRepository('AppBundle:Items')->findOneBy([
            'id'=> $id
        ]);

        /// gestion place et gestion or
        $gold = $character->getGold();
        if ($gold >= $item->getPriceSell()){
            $weigthLimit = $character->getMaxBagCapacity();
            $itemsCharacter = $em->getRepository('AppBundle:Itemsbycharacter')->findBy([
                'characterid' => $character,
            ]);
            $weigth = 0;
            foreach ($itemsCharacter as $itemCharacter){
                $weigth += $itemCharacter->getWeigth();
            }
            if(($weigth + $itemCharacter->getWeigth()) <= $weigthLimit){
                $newItemCharacter = new Itemsbycharacter();
                $newItemCharacter->setEquiped(0);
                $newItemCharacter->setContained(1);
                $newItemCharacter->setContainerSpace($item->getContainerSpace());
                $newItemCharacter->setContainerId($item->getContainer());
                $newItemCharacter->setName($item->getName());
                $newItemCharacter->setType($item->getType());
                $newItemCharacter->setLevelMin($item->getLevelMin());
                $newItemCharacter->setLevel($item->getLevel());
                $newItemCharacter->setQuality($item->getQuality());
                $newItemCharacter->setBonusMove($item->getBonusMove());
                $newItemCharacter->setBonusQuickness($item->getBonusQuickness());
                $newItemCharacter->setBonusAttack($item->getBonusAttack());
                $newItemCharacter->setBonusDefense($item->getBonusDefense());
                $newItemCharacter->setBonusCritical($item->getBonusCritical());
                $newItemCharacter->setBonusHealth($item->getBonusHealth());
                $newItemCharacter->setBonusEnergy($item->getBonusEnergy());
                $newItemCharacter->setCapacity($item->getCapacity());
                $newItemCharacter->setPriceBuy($item->getPriceBuy());
                $newItemCharacter->setPriceSell($item->getPriceSell());
                $newItemCharacter->setImage($item->getImage());
                $newItemCharacter->setOpen($item->getOpen());
                $newItemCharacter->setWeigth($item->getWeigth());
                $newItemCharacter->setItemid($item);
                $newItemCharacter->setCharacterid($character);

                $em->persist($newItemCharacter);
                $em->flush();

                $character->setGold($gold - $item->getPriceSell());
                $em->persist($character);
                $em->flush();

                $message = $item->getName(). " acheté. Félicitations";
            } else {
                $message = "Pas assez de place dans votre inventaire.";
            }

        } else {
            $message = "Pas assez d'or";
        }

        return $this->render('default/sellItem.html.twig', [
            'items' => $items,
            'character' => $character,
            'message' => $message,
        ]);

    }

    /**
     * @Route("/buy/{placeId}", name="buy")
     */
    public function buyAction($placeId){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $items = $em->getRepository('AppBundle:Itemsbycharacter')->findBy([
            'characterid' => $character,
        ]);

        return $this->render('default/buy.html.twig', [
            'items' => $items,
            'character' => $character,
            'message' => null,
        ]);
    }

    /**
     * @Route("/buy/item/{id}", name="buy_item")
     */
    public function buyItemAction($id){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $character = $em->getRepository('AppBundle:Characters')->findOneBy([
            'id'=>$character->getId(),
        ]);

        $item = $em->getRepository('AppBundle:Itemsbycharacter')->findOneBy([
            'id'=> $id
        ]);

        $message = $item->getName(). " vendu. Félicitations";

        $em->remove($item);
        $em->flush();

        $character->setGold($character->getGold()+$item->getPriceBuy());
        $em->persist($character);
        $em->flush();

        $items = $em->getRepository('AppBundle:Itemsbycharacter')->findBy([
            'characterid' => $character,
        ]);

        return $this->render('default/buy.html.twig', [
            'items' => $items,
            'character' => $character,
            'message' => $message,
        ]);

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