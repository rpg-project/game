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
use AppBundle\Entity\Characterlocation;

class CharacterController extends Controller
{
    /**
     * @Route("/createCharacter", name="create_Character")
     */
    public function createCharacterAction(Request $request)
    {
        //create a new character

        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:users')->find(1);

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
        $character->setLevel(1);

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

            return $this->redirectToRoute('character_success', [
                'characterId' => $character->getId(),
            ]);
        }

        return $this->render('default/newCharacter.html.twig', [
            'form' => $form->createView(),
        ]);


    }

    /**
     * @Route("/successCharacter/{characterId}", name="character_success")
     */
    public function successCharacterAction($characterId)
    {

        $em = $this->getDoctrine()->getManager();

        $character = $em->getRepository('AppBundle:Characters')->find($characterId);

        $map = $em->getRepository('AppBundle:Map')->find(1);

        $location = new Characterlocation();

        $location->setCharacterid($character);
        $location->setMapid($map);
        $em->persist($location);
        $em->flush();


        return $this->render('default/successCharacter.html.twig', [
            'character' => $character,
            'map' => $map,
        ]);

    }
}
