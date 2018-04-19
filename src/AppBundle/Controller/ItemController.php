<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Entity\Items;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ItemController extends Controller
{
    /**
     * @Route("/admin/item/new", name="admin_item_new")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = new Items();

        $zone = $em->getRepository('AppBundle:Map')->findAll();
        $maps = array();
        foreach ($zone as $map){
            $maps[$map->getMapName()] = $map->getId();
        }

        $rates = $em->getRepository('AppBundle:Rate')->findAll();

        $rateLabel = array();
        $popRate = array();
        foreach ($rates as $rate){
            $rateLabel[$rate->getRateLabel()] = $rate->getRateLabel();
            $popRate[$rate->getRateLabel()] = $rate->getPopRate();
        }

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('name', TextType::class)
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Arme' => 1,
                    'Contenaire' => 2,
                    'Consommable' => 3,
                    'Armure' => 4,
                    )
            ))
            ->add('level', TextType::class)
            ->add('level_min', TextType::class)
            ->add('quality', ChoiceType::class, array(
                'choices' => $rateLabel,
            ))
            ->add('bonus_move', TextType::class)
            ->add('bonus_quickness', TextType::class)
            ->add('bonus_attack', TextType::class)
            ->add('bonus_defense', TextType::class)
            ->add('bonus_critical', TextType::class)
            ->add('bonus_health', TextType::class)
            ->add('bonus_energy', TextType::class)
            ->add('image', TextType::class)
            ->add('pop_rate', ChoiceType::class, array(
                'choices' => $popRate,
            ))
            ->add('pop_zone', ChoiceType::class, array(
                'choices' => $maps,
            ))
            ->add('capacity', TextType::class)
            ->add('price_buy', TextType::class)
            ->add('price_sell', TextType::class)
            ->add('open', TextType::class)
            ->add('open', TextType::class)
            ->add('container', TextType::class)
            ->add('container_space', TextType::class)
            ->add('weigth', TextType::class)
            ->add('save', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_item_show', array('id' => $entity->getId())));
        }

        return $this->render('default/newItem.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Show a Item entity.
     * @Route("/admin/item/show/{id}", name="admin_item_show")
     *
     */
    public function itemShow($id){

        $em = $this->getDoctrine()->getManager();

        $item = $em->getRepository('AppBundle:Items')->find($id);

        return $this->render('default/item.html.twig', array(
            'item' => $item,
        ));

    }
}