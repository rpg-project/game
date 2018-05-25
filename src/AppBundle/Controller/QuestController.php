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

        $quests = $em->getRepository('AppBundle:Quests')->findBy([
            'placeid' => $id,
            ]);

        $countQuests = count($quests);

        $newChapter = 1;
        if($countQuests >= 1){
            $newChapter = $quests[$countQuests-1]->getChapter()+1;    
        } 

        $zones = $em->getRepository('AppBundle:Map')->findBy([
            'type' => 2,
            ]);

        $listZones = array();
        foreach ($zones as $key => $zone) {
            $listZones[$zone->getMapName()] = $zone->getId();
        }
                

        $entity = new Quests();

        $dictionary = new Dictionary();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('title', TextType::class)
            ->add('chapter', TextType::class, array('data' => $newChapter))
            ->add('description', TextareaType::class)
            ->add('difficulty_Min', ChoiceType::class, array(
                'choices' => $dictionary->getLabelDifficulties(),
            ))
            ->add('difficulty_Max', ChoiceType::class, array(
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
            ->add('starting_zone', ChoiceType::class, array(
                'choices' => $listZones,
            ))
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

            return $this->redirect($this->generateUrl('admin_places_quest_show', array('id' => $entity->getId())));
        }

        return $this->render('default/newQuest.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));

    }

    /**
    * Show a quest entity.
    * @Route("/admin/places/quest/show/{id}", name="admin_places_quest_show")
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

    /**
     * @Route("/admin/places/quest/list/{id}", name="admin_places_list_quests")
     */
    public function placesListQuestsAction($id){

        $em = $this->getDoctrine()->getManager();

        $quests = $em->getRepository('AppBundle:Quests')->findBy([
            'placeid'=> $id,
            ]);

        return $this->render('default/listQuests.html.twig', array(
            'quests' => $quests,
            'placeId' => $id,
            //'dico' => $dictionary->getTypeLabelInfo(),
        ));
    }

}