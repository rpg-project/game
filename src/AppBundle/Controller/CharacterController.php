<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\Users;
use AppBundle\Entity\Characters;
use AppBundle\Entity\Map;

class CharacterController extends Controller
{
    /**
     * @Route("/createCharacter", name="create_Character")
     */
    public function createCharacterAction(Request $request)
    {
        //create a new character

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $user = $session->get('user');

        $user = $em->getRepository('AppBundle:Users')->find($user->getId());

        $character = new Characters();

        $character->setAttack(3);
        $character->setDefense(3);
        $character->setCritical(1);
        $character->setHealth(5);
        $character->setMaxHealth(5);
        $character->setEnergy(5);
        $character->setMaxEnergy(5);
        $character->setStamina(5);
        $character->setMaxStamina(5);
        $character->setMove(3);
        $character->setQuickness(3);
        $character->setLevel(1);
        $character->setLocation(1);
        $character->setRepopLocation(1);
        $character->setBoxSize(0);
        $character->setMaxBoxSize(10);
        $character->setImage('/images/tete.jpg');
        $character->setGold(0);
        $character->setXp(0);
        $character->setGlory(0);
        $character->setLaw(0);
        $character->setChaos(0);
        $character->setGood(0);
        $character->setEvil(0);
        $character->setMaxBagCapacity(10);


        $form = $this->createFormBuilder($character)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Character'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $character = $form->getData();

            $character->setUserid($user);

            $em->persist($character);
            $em->flush();

            $session->set('character', $character);

            return $this->redirectToRoute('character_success', [
                'characterId' => $character->getId(),
            ]);
        }

        return $this->render('default/characters/newCharacter.html.twig', [
            'form' => $form->createView(),
        ]);


    }

    /**
     * @Route("/successCharacter/", name="character_success")
     */
    public function successCharacterAction()
    {

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $map = $em->getRepository('AppBundle:Map')->find(1);

        $session->set('map', $map);

        return $this->render('default/characters/successCharacter.html.twig', [
            'character' => $character,
            'map' => $map,
        ]);

    }
}
