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

        return $this->render('default/newInformation.html.twig', array(
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

        return $this->render('default/showInformation.html.twig', array(
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

    	return $this->render('default/listInformations.html.twig', array(
            'infos' => $infos,
            'placeId' => $id,
            //'dico' => $dictionary->getTypeLabelInfo(),
        ));
    }


}