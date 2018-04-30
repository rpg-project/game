<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use AppBundle\Entity\Quests;
use AppBundle\Entity\Dictionary;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\DateTime;

class QuestController extends Controller
{
    /**
     * @Route("admin/places/addquest/{id}", name="admin_places_add_quete")
     */
    public function placesAddQuestAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();

        $entity = new Quests();

        $dictionary = new Dictionary();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('difficulty', ChoiceType::class, array(
                'choices' => $dictionary->getLabelDifficulties(),
            ))
            ->add('gloryReward', TextType::class)
            ->add('xpReward', TextType::class)
            ->add('goldReward', TextType::class)
            ->add('bonusLaw', TextType::class)
            ->add('bonusChaos', TextType::class)
            ->add('bonusGood', TextType::class)
            ->add('bonusEvil', TextType::class)
            ->add('level_min', TextType::class)
            ->add('save', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $place = $em->getRepository('AppBundle:Places')->findOneBy([
            'id'=>$id,
        ]);

        $entity->setPlaceId($place);

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_quest_show', array('id' => $entity->getId())));
        }

        return $this->render('default/newQuest.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));

    }

    /**
    * Show a quest entity.
    * @Route("/admin/quest/show/{id}", name="admin_quest_show")
    *
    */
    public function questShow($id)
    {

        $em = $this->getDoctrine()->getManager();

        $quest = $em->getRepository('AppBundle:Quests')->find($id);

        $dictionary = new Dictionary();

        return $this->render('default/quest.html.twig', array(
            'quest' => $quest,
            'dico' => $dictionary,
        ));

    }


}