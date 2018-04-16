<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Characters;
use AppBundle\Entity\Followersbycharacter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Team;

class OptionsController extends Controller
{
	/**
     * @Route("/options/followers/{id}", name="options_followers")
     */
    public function followersAction($id){

    	$em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

    	$followers = $em->getRepository('AppBundle:Followersbycharacter')-> findBy([
    		'characterid' => $id,
    		]);

        $session->set('followersList',$followers);

    	return $this->render('default/box.html.twig', [
            'followers' => $followers,
            'character' => $character,
        ]);

    }

    /**
     * @Route("/options/followersOrder/{order}", name="options_followers_order")
     */
    public function followersOrderAction($order){

        $session = $this->get('session');

        $followers = $session->get('followersList');

        $character = $session->get('character');

        $listOrder = $this->order($followers, $order);

        return $this->render('default/box.html.twig', [
            'followers' => $listOrder,
            'character' => $character,
        ]);

    }

    /**
     * @Route("/options/team/{id}", name="options_team")
     */
    public function teamAction($id){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $followers = $em->getRepository('AppBundle:Followersbycharacter')-> findBy([
            'characterid' => $id,
        ]);

        $team = $em->getRepository('AppBundle:Team')->findBy([
            'characterId' => $id,
        ]);

        /** @var Characters $character */
        $balance = $character->getLaw()- $character->getChaos();
        $goodness = $character->getGood()- $character->getEvil();
        $balanceTeam = 0;
        $goodnessTeam = 0;
        $session->set('gold', $character->getGold());

        $teamFinal = array();
        for($i=1; $i <=5; $i++){
            $teamFinal[$i]['mate'] = false;
        }
        $goldMin = 0;
        if(!empty($team)){
            /** @var Team $mate */
            foreach ($team as $mate){
                $place = $mate->getPlace();
                $follower = $em->getRepository('AppBundle:Followersbycharacter')->findOneBy([
                    'id' => $mate->getTeamMateId(),
                ]);

                /** @var Followersbycharacter $follower  */
                $teamFinal[$place]['mate'] = $follower;
                if($follower->getGoal() === 3){
                    $goldMin += $follower->getLevel() * $follower->getFollowerid()->getLevelMin();
                    $session->set('goldMin', $goldMin);
                }
                $teamFinal[$place]['avalaible'] = $this->goal($follower->getGoal());
                if($teamFinal[$place]['avalaible'] == false){
                    $mate->setAvalaible(1);
                } else {
                    $mate->setAvalaible(0);
                }
                $balance += $follower->getLaw() - $follower->getChaos();
                $balanceTeam += $follower->getLaw() - $follower->getChaos();
                $goodness += $follower->getGood() - $follower->getEvil();
                $goodnessTeam += $follower->getGood() - $follower->getEvil();
            }
        }

        $session->set('balance', $balance);
        $session->set('goodness', $goodness);
        $session->set('balanceTeam', $balanceTeam);
        $session->set('goodnessTeam', $goodnessTeam);

        ksort($teamFinal);

        $session->set('team', $teamFinal);

        return $this->render('default/team.html.twig', [
            'followers' => $followers,
            'character' => $character,
            'team' => $teamFinal,
            'balanceTeam' => $balanceTeam,
            'goodnessTeam' => $goodnessTeam,
        ]);

    }

    /**
     * @Route("/options/team_choice/{place}", name="options_team_choice")
     */
    public function teamChoiceAction($place){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $followers = $em->getRepository('AppBundle:Followersbycharacter')-> findBy([
            'characterid' => $character->getid(),
            'teamed' => 0,
        ]);

        $team = $session->get('team');

        $uniqueList = $this->uniqueFollower($team);

        $list = $this->avalaibleList($followers, $uniqueList);

        $session->set('teamChoiceList', $followers);
        $session->set('teamChoicePlace', $place);

        return $this->render('default/teamChoices.html.twig', [
            'followers' => $list,
            'place' => $place,
        ]);
    }

    /**
     * @Route("/options/team_choice_order/{order}", name="options_team_choice_order")
     */
    public function teamChoiceOrderAction($order){

        $session = $this->get('session');

        $character = $session->get('character');

        $followers =  $session->get('teamChoiceList');
        $place = $session->get('teamChoicePlace');
        $team = $session->get('team');

        $uniqueList = $this->uniqueFollower($team);

        $list = $this->avalaibleList($followers, $uniqueList);

        $listFollower = array();
        foreach ($list as $key => $value) {
            $listFollower[] = $value['mate'];
        }

        $listOrder = $this->order($listFollower, $order);  

        $list2 = array();
        foreach ($listOrder as $key => $value) {
            $list2[] = $list[$value->getId()];
        }

        return $this->render('default/teamChoices.html.twig', [
            'followers' => $list2,
            'place' => $place,
        ]);
    }

    /**
     * @Route("/options/team_add/{place}/{followerId}/{teamMateId}", name="options_team_add")
     */
    public function teamAddAction($place, $followerId, $teamMateId){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $team = new Team();

        $team->setPlace($place);
        $team->setTeamMateId($teamMateId);
        $team->setCharacterId($character->getId());
        $team->setFollowerId($followerId);

        $em->persist($team);
        $em->flush();

        $follower = $em->getRepository('AppBundle:Followersbycharacter')-> find($teamMateId);

        $follower->setTeamed(1);
        $em->persist($follower);
        $em->flush();

        return $this->redirect($this->generateUrl('options_team', array(
            'id' => $character->getId(),
        )));
    }

    /**
     * @Route("/options/team_del/{place}/{teamMateId}", name="options_team_del")
     */
    public function teamDelAction($place, $teamMateId){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $teamMate = $em->getRepository("AppBundle:Team")->findBy([
            'place' => $place,
            'characterId' => $character->getId(),
        ]);

        $em->remove($teamMate[0]);
        $em->flush();

        $follower = $em->getRepository('AppBundle:Followersbycharacter')->find($teamMateId);

        $follower->setTeamed(0);

        $em->persist($follower);
        $em->flush();

        return $this->redirect($this->generateUrl('options_team', array(
            'id' => $character->getId(),
        )));

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

    /**
     * @Route("/options/list", name="options_list")
     */
    public function optionsListAction(){

        return $this->render('default/optionsList.html.twig');

    }

    /**
     * @Route("/options/followers_list", name="options_followers_list")
     */
    public function followersListAction(){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $followers = $em->getRepository('AppBundle:Followers')-> findAll();

        $session->set('followersLibrary', $followers);

        return $this->render('default/followersLibrary.html.twig',[
            'followers'=>$followers,
            ]);
    }

    /**
     * @Route("/options/followers_list_order/{order}", name="options_followers_list_order")
     */
    public function followersListOrderAction($order){

        $session = $this->get('session');

        $followers = $session->get('followersLibrary');

        $listOrder = $this->order($followers, $order);



        return $this->render('default/followersLibrary.html.twig', [
            'followers' => $listOrder,
        ]);
    }



    /**
    ** return array
    */
    public function order($followers, $order){
        $list = array();
        foreach ($followers as $key => $follower) {
            switch($order){
                case "name":$list[$key]=$follower->getName();
                            asort($list);
                            break;
                case "rate":$list[$key]=$follower->getRateLabel();
                            arsort($list);
                            break;
                case "level":$list[$key]=$follower->getLevel();
                            arsort($list);
                            break;
                case "teamed":$list[$key]=$follower->getTeamed();
                            arsort($list);
                            break;
                case "goal":$list[$key]=$follower->getGoal();
                            asort($list);
                            break;
            }
        }



        $listOrder = array();
        foreach ($list as $key => $value) {
            $listOrder[] = $followers[$key];
        }

        return $listOrder;
    }

    /**
    ** return array
    */
    public function uniqueFollower($team){
        $uniqueList = array();
        foreach ($team as $mate){
              if($mate['mate'] !== false) {
                  if ($mate['mate']->getUniqueRate() == 1) {
                      $uniqueList[] = $mate['mate']->getFollowerid()->getId();
                  }
              }
        }

        return $uniqueList;
    }

    /**
    ** return array
    */
    public function avalaibleList($followers, $uniqueList){

        $list = array();
        $x = 0;
        foreach ($followers as $follower){
            $list[$follower->getId()]['mate'] = $follower;
            $list[$follower->getId()]['avalaible'] = $this->goal($follower->getGoal());
            if(in_array($follower->getFollowerid()->getId(), $uniqueList, true)){
                $list[$follower->getId()]['avalaible'] = false;
            }
            $x++;
        }

        return $list;
    }

    /**
     * @Route("/options/inventory/{id}", name="options_inventory")
     */
    public function inventoryAction($id, $containerId = null){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $team = $session->get('team');

        $inventory = $em->getRepository('AppBundle:Itemsbycharacter')-> findBy([
            'characterid' => $id,
        ]);

        $listEquiped = array();
        $list = array();
        foreach ($inventory as $item){
            if($item->getEquiped() === 1){
                $listEquiped[] = $item;
            } else {
                $list[] = $item;
            }
        }

        $listIn = array();
        $count = 0;
        for($i=0;$i<$character->getMaxBagCapacity();$i++){
            if(isset($list[$i])){
                $listIn[$i] = $list[$i];
                $count++;
            } else {
                $listIn[$i] = false;
            }
        }
        $session->set('listEquiped', $listEquiped);
        $session->set('list', $listIn);
        $session->set('count', $count);

        return $this->render('default/inventory.html.twig', [
            'listEquiped' => $listEquiped,
            'listIn' => $listIn,
            'character' => $character,
            'team' => $team,
            'count'=>$count,
        ]);
    }

    /**
     * @Route("/options/inventory/follower/see/{id}", name="options_inventory_follower_see")
     */
    public function inventoryFollowerSeeAction($id){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');
        $team = $session->get('team');
        $listEquiped = $session->get('listEquiped');
        $listIn = $session->get('list');
        $count = $session->get('count');

        $follower = $followerInventory = $em->getRepository('AppBundle:Followersbycharacter')-> findOneBy([
            'id' => $id,
        ]);

        $followerInventory = $em->getRepository('AppBundle:Itemsbyfollowers')-> findBy([
            'followerid' => $id,
        ]);

        $followerListEquiped = array();
        $followerList = array();
        foreach ($followerInventory as $item){
            if($item->getEquiped() === 1){
                $followerListEquiped[] = $item;
            } else {
                $followerList[] = $item;
            }
        }

        $followerListIn = array();
        $countFollower = 0;
        for($i=0;$i<$follower->getMaxCapacityBag();$i++){
            if(isset($followerList[$i])){
                $followerListIn[$i] = $followerList[$i];
                $countFollower++;
            } else {
                $followerListIn[$i] = false;
            }
        }


        return $this->render('default/inventoryFollower.html.twig', [
            'listEquiped' => $listEquiped,
            'listIn' => $listIn,
            'character' => $character,
            'team' => $team,
            'count'=>$count,
            'countFollower'=>$countFollower,
            'followerListEquiped' => $followerListEquiped,
            'followerListIn' => $followerListIn,
            'follower' => $follower,
        ]);
    }



}