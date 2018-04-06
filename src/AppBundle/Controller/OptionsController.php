<?php

namespace AppBundle\Controller;

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

    	return $this->render('default/box.html.twig', [
            'followers' => $followers,
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
                $balance += $follower[0]->getLaw() - $follower[0]->getChaos();
                $balanceTeam += $follower[0]->getLaw() - $follower[0]->getChaos();
                $goodness += $follower[0]->getGood() - $follower[0]->getEvil();
                $goodnessTeam += $follower[0]->getGood() - $follower[0]->getEvil();
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
        $uniqueList = array();
        foreach ($team as $mate){
              if($mate['mate'] !== false) {
                  if ($mate['mate']->getUniqueRate() == 1) {
                      $uniqueList[] = $mate['mate']->getFollowerid()->getId();
                  }
              }
        }

        $list = array();
        $x = 0;
        foreach ($followers as $follower){
            $list[$x]['mate'] = $follower;
            $list[$x]['avalaible'] = $this->goal($follower->getGoal());
            if(in_array($follower->getFollowerid()->getId(), $uniqueList, true)){
                $list[$x]['avalaible'] = false;
            }
            $x++;
        }

        return $this->render('default/teamChoices.html.twig', [
            'followers' => $list,
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
}