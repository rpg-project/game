<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Entity\Fights;
use AppBundle\Entity\Monstersbyfight;
use AppBundle\Entity\Dictionary;
use AppBundle\Entity\Map;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\DateTime;

class FightController extends Controller
{

    /**
     * @Route("/admin/fight/new", name="admin_new_fight")
     */
    public function newFightAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = new Fights();

        $quests = $em->getRepository('AppBundle:Quests')->findAll();

        $questList = array();
        foreach ($quests as $quest){
            $questList[$quest->getTitle()] = $quest;
        }

        $maps = $em->getRepository('AppBundle:Map')->findBy([
            'type' =>3,
        ]);

        $mapList = array();
        foreach ($maps as $map){
            $mapList[$map->getMapName()] = $map;
        }

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('name', TextType::class)
            ->add('quest', ChoiceType::class, array(
                'choices' => $questList,
            ))
            ->add('fight_zone', ChoiceType::class, array(
                'choices' => $mapList,
            ))
            ->add('save', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_show_fight', array('id' => $entity->getId())));
        }

        return $this->render('default/admin/newFight.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/fight/show/{id}", name="admin_show_fight")
     */
    public function showFightAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $fight = $em->getRepository('AppBundle:Fights')->find($id);

        $monsters = $em->getRepository('AppBundle:Monsters')->findAll();

        $monsterByFight = $em->getRepository('AppBundle:Monstersbyfight')->findBy([
            'fight' => $id,
        ]);


        return $this->render('default/admin/showFight.html.twig', array(
            'fight' => $fight,
            'monsters' => $monsters,
            'monsterByFight' => $monsterByFight,
        ));
    }

    /**
     * @Route("/admin/fight/addMonster/{fightId}/{monsterId}/", name="admin_fight_add_monster")
     */
    public function addMonsterFightAction($fightId, $monsterId)
    {
        $em = $this->getDoctrine()->getManager();

        $monsterByFight = new Monstersbyfight();

        $monster = $em->getRepository('AppBundle:Monsters')->find($monsterId);

        $fight = $em->getRepository('AppBundle:Fights')->find($fightId);

        $monsterByFight->setMonster($monster);
        $monsterByFight->setFight($fight);
        $monsterByFight->setNumber(1);

        $em->persist($monsterByFight);
        $em->flush();

        return $this->redirectToRoute('admin_show_fight', array('id'=>$fightId));

    }

    /**
     * @Route("/admin/fight/delete/{id}", name="admin_fight_delete_monster")
     */
    public function deleteMonsterFightAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $monster = $em->getRepository('AppBundle:Monstersbyfight')->find($id);

        $fightId = $monster->getFight()->getId();

        $em->remove($monster);
        $em->flush();

        return $this->redirectToRoute('admin_show_fight', array('id'=>$fightId));

    }

    /**
     * @Route("/quest/fight/{id}", name="quest_fight")
     */
    public function questFightAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $character = $session->get('character');

        $fight = $em->getRepository('AppBundle:Fights')->find($id);

        $chemin = dirname(__FILE__).'/../../../web/Ressources/zones.txt';

        if(file_exists($chemin)){
            $file = json_decode(file_get_contents($chemin));
        }

        $mapJSON = "";

        foreach ($file as $key => $zone) {
            if($zone->id == $fight->getFightZone()->getId()){
                $mapJSON = json_decode($zone->mapContent);
            }
        }

        $map = "";
        if(!empty($mapJSON)){
            foreach ($mapJSON as $key => $lines) {
                foreach ($lines as $key => $cols) {

                    $map[$cols->x][$cols->y]['x'] = $cols->x;
                    $map[$cols->x][$cols->y]['y'] = $cols->y;
                    $map[$cols->x][$cols->y]['decoration'] = $cols->decoration;
                    $map[$cols->x][$cols->y]['obstacle'] = $cols->obstacle;
                    $map[$cols->x][$cols->y]['monster'] = $cols->monster;
                    $map[$cols->x][$cols->y]['trigger'] = $cols->trigger;
                }
            }
        }

        return $this->render('default/places/fight.html.twig', [
            'map' => $map,
            'character' => $character,
        ]);
    }
}