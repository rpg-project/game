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

        $character = $entityManager->getRepository('AppBundle:Characters')->findOneBy([
            'userid' => $user->getId(),
        ]);

        $nbCharacter = count($character);

        if($nbCharacter !== 0){
            $session->set('character', $character);
        }

        $infos = $this->resource();

        $chemin = dirname(__FILE__).'/../../../web/Ressources/infos.txt';

        if(!file_exists($chemin)){
            $handle = fopen($chemin, "w");
            fputs($handle, $infos);
            fclose($handle);
        } else {
            $handle = fopen($chemin, "w");
            fputs($handle, $infos);
            fclose($handle);
        }

        return $this->render('default/index.html.twig', [
            'nbCharacters' => $nbCharacter
        ]);
    }

    public function resource(){
        $em = $this->getDoctrine()->getManager();

        $infos = $em->getRepository('AppBundle:Infos')->findAll();

        $test = array();
        foreach ($infos as $key => $info){
            $test[$key]['id'] = $info->getId();
            $test[$key]['title'] = $info->getTitle();
            $test[$key]['infos'] = $info->getInfos();
            $test[$key]['placeId'] = $info->getPlaceId();
            $test[$key]['type'] = $info->getType();
        }

        $infos = json_encode($test);

        return $infos;
    }
}
