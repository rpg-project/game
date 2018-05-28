<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;
use AppBundle\Entity\Players;
use AppBundle\Entity\Characterlocation;
use AppBundle\Entity\Followers;
use AppBundle\Entity\Followersitems;

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

        return $this->render('default/followers/stats.html.twig', [
            'stats' => $follower,
            'admin' => false,
        ]);
    }

    /**
     * @Route("/stats_library/{id}", name="stats_library")
     */
    public function statsLibraryAction($id){

        $em = $this->getDoctrine()->getManager();

        $follower = $em->getRepository('AppBundle:Followers')->find($id);

        return $this->render('default/followers/stats.html.twig', [
            'stats' => $follower,
            'admin' => false,
        ]);
    }

    /**
     * Creates a new Follower entity.
     * @Route("/admin/follower/new", name="admin_new_follower")
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = new Followers();

        $zone = $em->getRepository('AppBundle:Map')->findAll();
        $maps = array();
        foreach ($zone as $map){
            $maps[$map->getMapName()] = $map->getId();
        }

        $rates = $em->getRepository('AppBundle:Rate')->findAll();

        $rateLabel = array();
        $popRate = array();
        $priceBack = array();
        foreach ($rates as $rate){
            $rateLabel[$rate->getRateLabel()] = $rate->getRateLabel();
            $popRate[$rate->getRateLabel()] = $rate->getPopRate();
            $priceBack[$rate->getRateLabel()] = $rate->getPriceBack();
        }

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
                'choices' => $maps,
                    ))
        ->add('xp', TextType::class)
        ->add('image', TextType::class)
        ->add('rate_label', ChoiceType::class, array(
                'choices' => $rateLabel,
                    ))
        ->add('pop_rate', ChoiceType::class, array(
                'choices' => $popRate,
                    ))
        ->add('price_back', ChoiceType::class, array(
                'choices' => $priceBack
                    ))
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
        ->add('description', TextareaType::class)
        ->add('save', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));
        
        $form = $formBuilder->getForm(); 

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_follower_show', array('id' => $entity->getId())));
        }

        return $this->render('default/admin/newFollower.html.twig', array(
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

       $session = $this->get('session');

       $follower = $em->getRepository('AppBundle:Followers')->find($id);

       $items = $em->getRepository('AppBundle:Items')->findAll();

       $session->set('adminFollower', $follower);
       $session->set('adminItems', $items);

        $chosenListItem = $em->getRepository('AppBundle:Followersitems')->findBy([
            'followersid'=> $follower->getId(),
        ]);

        $chosenList = array();
        foreach ($chosenListItem as $item){
            $chosenList[] = $em->getRepository('AppBundle:Items')->findOneBy([
                'id' => $item->getItemid(),
            ]);
        }

           return $this->render('default/followers/stats.html.twig', array(
            'stats' => $follower,
            'admin' => true,
            'items' => $items,
            'chosen' => $chosenList,
        ));

    }

    /**
     * @Route("/admin/follower/add/{id}", name="admin_follower_add_item")
     *
     */
    public function followerAddItem($id){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $follower = $session->get('adminFollower');
        $items = $session->get('adminItems');

        $item = $em->getRepository('AppBundle:Items')->findOneBy([
            'id'=> $items[$id]->getId(),
        ]);

        $follower = $em->getRepository('AppBundle:Followers')->findOneBy([
            'id'=> $follower->getId(),
        ]);

        $chosenItem = new Followersitems();
        $chosenItem->setItemid($item);
        $chosenItem->setEquiped(0);
        $chosenItem->setFollowersid($follower);

        $em->persist($chosenItem);
        $em->flush();

        return $this->redirectToRoute('admin_follower_show', [
            'id' => $follower->getId(),
            ]);

    }

    /**
     * @Route("/admin/follower/delitem/{id}", name="admin_follower_del_item")
     *
     */
    public function followerDelItem($id){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $follower = $session->get('adminFollower');
        $items = $session->get('adminItems');

        $item = $em->getRepository('AppBundle:Items')->findOneBy([
            'id' => $id,
        ]);

        $itemFollower =  $em->getRepository('AppBundle:Followersitems')->findOneBy([
            'itemid'=> $item,
            'followersid' => $follower,
        ]);

        $em->remove($itemFollower);
        $em->flush();

        return $this->redirectToRoute('admin_follower_show', [
            'id' => $follower->getId(),
            ]);
    }

    /**
     * @Route("/admin/follower/list", name="admin_follower_list")
     *
     */
    public function followerList(){

        $em = $this->getDoctrine()->getManager();

        $followers = $em->getRepository('AppBundle:Followers')->findAll();

        $list = array();
        foreach($followers as $follower){
            $list[$follower->getId()]['follower'] = $follower;
            $list[$follower->getId()]['count'] = count($em->getRepository('AppBundle:Followersbycharacter')->findBy(['followerid'=>$follower->getId()]));
            $list[$follower->getId()]['countObject'] = count($em->getRepository('AppBundle:Followersitems')->findBy(['followersid'=>$follower->getId()]));
        }

//        var_dump($list);

        return $this->render('default/admin/followersList.html.twig', array(
            'list' => $list,
        ));
    }

    /**
     * @Route("/admin/follower/del/{id}", name="admin_follower_del")
     *
     */
    public function followerDel($id){

        $em = $this->getDoctrine()->getManager();

        $follower = $em->getRepository('AppBundle:Followers')->findOneBy([
            'id' => $id,
        ]);

        $em->remove($follower);
        $em->flush();

        return $this->redirectToRoute('admin_follower_list');

    }

}