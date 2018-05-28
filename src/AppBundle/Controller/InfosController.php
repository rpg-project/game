<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Infos;
use AppBundle\Entity\Infosbycharacter;
use AppBundle\Entity\Dictionary;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\DateTime;

class InfosController extends Controller
{
	/**
     * @Route("/admin/places/addinfo/{id}", name="admin_places_add_info")
     */
    public function placesAddInfoAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();

        $entity = new Infos();

        $dictionary = new Dictionary();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Information' => 1,
                    'Tutorial' => 2,
                )))
            ->add('title', TextType::class)
            ->add('infos', TextareaType::class)
            ->add('save', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $entity->setPlaceId($id);

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_places_information_show', array('id' => $entity->getId())));
        }

        return $this->render('default/admin/newInformation.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/places/informationShow/{id}", name="admin_places_information_show")
     */
    public function infoShowAction($id){
        $em = $this->getDoctrine()->getManager();

        $info = $em->getRepository('AppBundle:Infos')->findOneBy([
            'id' => $id,
        ]);

        $dictionary = new Dictionary();

        return $this->render('default/admin/showInformation.html.twig', array(
            'info' => $info,
            'placeId' => null,
            'admin' => true,
            'dico' => $dictionary->getTypeLabelInfo(),
        ));
    }

    /**
     * @Route("/admin/places/info/list/{id}", name="admin_places_list_info")
     */
    public function placesListInfoAction($id){

    	$em = $this->getDoctrine()->getManager();

    	$infos = $em->getRepository('AppBundle:Infos')->findBy([
    		'placeId'=> $id,
    		]);

    	return $this->render('default/admin/listInformations.html.twig', array(
            'infos' => $infos,
            'placeId' => $id,
            //'dico' => $dictionary->getTypeLabelInfo(),
        ));
    }

    /**
     * @Route("/admin/info/triggers", name="admin_info_new_trigger")
     */
    public function addNewTriggerAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $entity = new Infos();

        $quests = $em->getRepository('AppBundle:Quests')->findAll();
        $listQuests = array();
        foreach ($quests as $key => $quest) {
            $listQuests[$quest->getTitle()] = $quest->getId();
        }

        $fights = $em->getRepository('AppBundle:Fights')->findAll();
        
        $maps = $em->getRepository('AppBundle:Map')->findBy([
            'type' =>2,
            ]);

        $dictionary = new Dictionary();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('type', TextType::class, array('data' => 4))
            ->add('title', TextType::class)
            ->add('infos', TextareaType::class)
            ->add('placeid',ChoiceType::class, array(
                'choices' => $listQuests
                ))
            ->add('save', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_trigger_show', array('id' => $entity->getId())));
        }

        return $this->render('default/admin/newTrigger.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'fights' => $fights,
            'maps' => $maps,
        ));
    }

    /**
     * @Route("/admin/trigger/show/{id}", name="admin_trigger_show")
     */
    public function triggerShowAction($id){
        $em = $this->getDoctrine()->getManager();

        $trigger = $em->getRepository('AppBundle:Infos')->findOneBy([
            'id' => $id,
        ]);

        $dictionary = new Dictionary();

        return $this->render('default/admin/showTrigger.html.twig', array(
            'trigger' => $trigger,
            'admin' => false,
        ));
    }

    /**
     * @Route("/admin/info/list/triggers", name="admin_info_list_trigger")
     */
    public function listTriggerAction(){

        $em = $this->getDoctrine()->getManager();

        $listTriggers = $em->getRepository('AppBundle:Infos')->findBy([
            'type' => 4,
            ]);

        return $this->render('default/admin/triggerList.html.twig', array(
            'triggers' => $listTriggers,
        ));

    }

    /**
     * @Route("/admin/info/display/trigger/{id}", name="admin_trigger_display")
     */
    public function displayTriggerAction($id){

        $em = $this->getDoctrine()->getManager();

        $trigger = $em->getRepository('AppBundle:Infos')->find($id);

        return $this->render('default/admin/showTrigger.html.twig', array(
            'trigger' => $trigger,
            'admin' => true,
        ));
    }
    


}