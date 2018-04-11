<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;
use AppBundle\Entity\Players;
use AppBundle\Entity\Characterlocation;


class FollowerController extends Controller
{
    /**
     * @Route("/stats_follower/{id}", name="stats_follower")
     */
    public function statsAction($id){

        $em = $this->getDoctrine()->getManager();

        $follower = $em->getRepository('AppBundle:Followersbycharacter')->find($id);

        return $this->render('default/stats.html.twig', [
            'stats' => $follower,
        ]);
    }

    /**
     * @Route("/stats_library/{id}", name="stats_library")
     */
    public function statsLibraryAction($id){

        $em = $this->getDoctrine()->getManager();

        $follower = $em->getRepository('AppBundle:Followers')->find($id);

        return $this->render('default/stats.html.twig', [
            'stats' => $follower,
        ]);
    }
}