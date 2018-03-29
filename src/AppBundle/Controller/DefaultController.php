<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = $entityManager->getRepository('AppBundle:Users')->find(1);

        $character = $entityManager->getRepository('AppBundle:Characters')->findBy([
            'userid' => $user->getId(),
        ]);

        $nbCharacter = count($character);


        return $this->render('default/index.html.twig', [
            'nbCharacters' => $nbCharacter
        ]);
    }
}
