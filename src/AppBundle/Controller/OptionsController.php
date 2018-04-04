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

        $teamFinal = array();
        for($i=1; $i <=5; $i++){
            $teamFinal[$i] = false;
        }
        if(!empty($team)){
            foreach ($team as $mate){
                $place = $mate->getPlace();
                $follower = $em->getRepository('AppBundle:Followersbycharacter')->findBy([
                    'id' => $mate->getTeamMateId(),
                ]);
                $teamFinal[$place] = $follower[0];
                $balance += $follower[0]->getLaw() - $follower[0]->getChaos();
                $goodness += $follower[0]->getGood() - $follower[0]->getEvil();
            }
        }

        $session->set('balance', $balance);
        $session->set('goodness', $goodness);

        ksort($teamFinal);

        $session->set('team', $teamFinal);

        return $this->render('default/team.html.twig', [
            'followers' => $followers,
            'character' => $character,
            'team' => $teamFinal,
        ]);

    }

    /**
     * @Route("/options/team_choice/{place}", name="options_team_choice")
     */
    public function teamChoiceAction($place){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $balance = $session->get('balance');
        $goodness = $session->get('goodness');



        $followers = $em->getRepository('AppBundle:Followersbycharacter')-> findBy([
            'characterid' => $character->getid(),
            'teamed' => 0,
        ]);

        $teamMates = $em->getRepository('AppBundle:Team')->findBy([
            'characterId' => $character->getid(),
        ]);

        return $this->render('default/teamChoices.html.twig', [
            'followers' => $followers,
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
     *
     */
    public function goal($balance, $goodness, $goal){


        switch($goal){
            case 1 :
            case 2 :
            Default : $available = true;
        }



        return $available;
    }
}