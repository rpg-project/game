<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $session = new Session();

        $user = $entityManager->getRepository('AppBundle:Users')->find(2);

        $session->set('user', $user);

        $character = $entityManager->getRepository('AppBundle:Characters')->findBy([
            'userid' => $user->getId(),
        ]);

        $nbCharacter = count($character);

        if($nbCharacter !== 0){
            $session->set('character', $character[0]);
        }

        $chemin = dirname(__FILE__).'/../../../web/Ressources/Description_Followers.txt';

        if(!file_exists($chemin)){
            $handle = fopen($chemin, "w");
            fputs($handle, "test2");
            fclose($handle);
        }
       

        return $this->render('default/index.html.twig', [
            'nbCharacters' => $nbCharacter
        ]);
    }
}
