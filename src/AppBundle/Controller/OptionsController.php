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

        return $this->render('default/team.html.twig', [
            'followers' => $followers,
            'character' => $character,
            'team' => $team,
        ]);

    }

    /**
     * @Route("/options/team_add/{place}", name="options_team_add")
     */
    public function teamAddAction($id){

        $em = $this->getDoctrine()->getManager();






    }
}