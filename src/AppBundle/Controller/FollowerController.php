<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;
use AppBundle\Entity\Players;
use AppBundle\Entity\Characterlocation;
use AppBundle\Entity\Followers;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FollowerController extends Controller
{
    /**
     * @Route("/stats_follower/{id}", name="stats_follower")
     */
    public function statsAction($id){

        $em = $this->getDoctrine()->getManager();

        $follower = $em->getRepository('AppBundle:Followersbycharacter')->find($id);

        return $this->render('default/stats.html.twig', [
            'stats' => $follower,
        ]);
    }

    /**
     * @Route("/stats_library/{id}", name="stats_library")
     */
    public function statsLibraryAction($id){

        $em = $this->getDoctrine()->getManager();

        $follower = $em->getRepository('AppBundle:Followers')->find($id);

        return $this->render('default/stats.html.twig', [
            'stats' => $follower,
        ]);
    }

    /**
     * Creates a new Follower entity.
     * @Route("/admin/follower/new", name="admin_new_follower")
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Followers();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);
        
        $formBuilder
        ->add('name', TextType::class)
        ->add('type', ChoiceType::class, array(
                'choices' => array('Taverne' => 1, 'Poste de garde' => 2),
            ))
        ->add('health', TextType::class)
        ->add('max_health', TextType::class)
        ->add('energy', TextType::class)
        ->add('max_energy', TextType::class)
        ->add('move', TextType::class)
        ->add('quickness', TextType::class)
        ->add('attack', TextType::class)
        ->add('defense', TextType::class)
        ->add('critical', TextType::class)
        ->add('level', TextType::class)
        ->add('level_min', ChoiceType::class, array(
                'choices' => array(
                    'Starting Ground' => 1,
                    )))
        ->add('xp', TextType::class)
        ->add('image', TextType::class)
        ->add('rate_label', ChoiceType::class, array(
                'choices' => array(
                    'SSR' => "SSR",
                    'SR' => "SR",
                    'R' => "R",
                    'N' => "N",
                    'C' => "C",
                    )))
        ->add('pop_rate', ChoiceType::class, array(
                'choices' => array(
                    'SSR' => 5,
                    'SR' => 10,
                    'R' => 25,
                    'N' => 35,
                    'C' => 50,
                    )))
        ->add('price_back', ChoiceType::class, array(
                'choices' => array(
                    'SSR' => 5,
                    'SR' => 4,
                    'R' => 3,
                    'N' => 2,
                    'C' => 1,
                    )))
        ->add('goal', ChoiceType::class, array(
                'choices' => array(
                    'Gloire' => 0,
                    'Loi' => 1,
                    'Loi et Bien' => 2,
                    'Or' => 3,
                    'Chaos' => 4,
                    )))
        ->add('unique_rate', ChoiceType::class, array(
                'choices' => array(
                    'Unique' => 1,
                    'Courant' => 0,
                    )))
        ->add('Law', TextType::class)
        ->add('Chaos', TextType::class)
        ->add('Good', TextType::class)
        ->add('Evil', TextType::class)
        ->add('save', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));
        
        $form = $formBuilder->getForm(); 

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_follower_show', array('id' => $entity->getId())));
        }

        return $this->render('default/newFollower.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Show a Follower entity.
     * @Route("/admin/follower/show/{id}", name="admin_follower_show")
     *
     */
    public function followerShow($id){
           $em = $this->getDoctrine()->getManager();
           $follower = $em->getRepository('AppBundle:Followers')->find($id);

           return $this->render('default/stats.html.twig', array(
            'stats' => $follower,
        ));

    }

}