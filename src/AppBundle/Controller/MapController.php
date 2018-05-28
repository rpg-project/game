<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Entity\Zone;
use AppBundle\Entity\Cell;
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

class MapController extends Controller
{
    /**
     * @Route("/admin/new/map", name="admin_new_map")
     */
    public function newMapAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $entity = new Map();

        $dictionary = new Dictionary();

        $quests = $em->getRepository('AppBundle:Quests')->findAll();

        $listQuests = array();
        foreach ($quests as $key => $quest) {
            $listQuests[$quest->getTitle()] = $quest->getId();
        }

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('mapName', TextType::class)
            ->add('type', ChoiceType::class, array(
                'choices' => $dictionary->getLabelMapContent(),
            ))
            ->add('width', TextType::class)
            ->add('height', TextType::class)
            ->add('keyid', ChoiceType::class, array(
                'choices' => $listQuests,
            ))
            ->add('genener la carte', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $session->set('zone', $entity);

            return $this->redirect($this->generateUrl('admin_map_show', array(
                'width' => $entity->getWidth(),
                'height' => $entity->getHeight(),
                )));
        }

        return $this->render('default/admin/adminMap.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));





        return $this->render('default/adminMap.html.twig');
    }

    /**
     * @Route("/admin/map/show/{width}/{height}", name="admin_map_show")
     */
    public function mapShowAction($width, $height){

        $session = $this->get('session');

        $zone = $session->get('zone');

        $map = array();
        for($i=0;$i<$height;$i++){
            $map[$i] = array();
            for($j=0;$j<$width;$j++){
                $map[$i][$j]=null;
            }
        }

        $session->set('map', $map);
        $session->set('state', 'new');
        $session->set('mapid', 0);

        return $this->render('default/admin/cell.html.twig', [
            'map'=>$map,
            'state'=>'new',
            'mapid'=>0,
            ]);
    }

    /**
     * @Route("/admin/map/cell/{x}/{y}", name="admin_map_cell")
     */
    public function mapCellAction(Request $request, $x, $y){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $map = $session->get('map');

        $height = count($map);
        $width = count($map[0]);

        $dictionary = new Dictionary();

        $monsters = $em->getRepository('AppBundle:Monsters')->findAll();

        $triggers = $em->getRepository('AppBundle:Infos')->findBy([
            'type' => 4,
            ]);

        $listTriggers = array();
        $listTriggers['none'] = 0;
        $listTriggers['departure'] = 1;
        foreach ($triggers as $key => $trigger) {
            $listTriggers[$trigger->getTitle()] = $trigger->getId();
        }

        $entity = new Cell();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('x', TextType::class, array('data' => $x))
            ->add('y', TextType::class, array('data' => $y))
            ->add('decoration', TextType::class)
            ->add('obstacle', TextType::class)
            ->add('monster', TextType::class, array('data' => 0))
            ->add('trigger', ChoiceType::class, array(
                'choices' => $listTriggers,
            ))
            ->add('genener la cellule', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $map[$x][$y] = $entity;
            $session->set('map', $map);
            $state = $session->get('state');
            $mapid = $session->get('mapid');
            return $this->render('default/admin/cell.html.twig', [
                'map'=>$map,
                'state'=>$state,
                'mapid'=>$mapid,
            ]);

        }

        $state = $session->get('state');
            $mapid = $session->get('mapid');

                 //echo '<pre>'.print_r($map, true).'</pre>';

        return $this->render('default/admin/cellContent.html.twig', [
            'map' => $map,
            'entity' => $entity,
            'form' => $form->createView(),
            'dico' => $dictionary->getLabelDecoration(),
            'monsters' => $monsters,
            'state'=>$state,
            'mapid'=>$mapid,
            ]);

    }

    /**
     * @Route("/admin/map/fillCell", name="admin_map_fill_cell")
     */
    public function mapFillCellAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $map = $session->get('map');

        //echo '<pre>'.print_r($map, true).'</pre>';

        $entity = new Cell();

        $dictionary = new Dictionary();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('decoration', TextType::class)
            ->add('obstacle', TextType::class)
            ->add('Remplir', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $x = count($map);
            $y = count($map[0]);
            for($i = 0; $i < $x; $i++){
                for($j = 0; $j < $y; $j++){
                    if($map[$i][$j] == null){
                        $cell = new Cell();
                        $cell->setX($i);
                        $cell->setY($j);
                        $cell->setDecoration($entity->getDecoration());
                        $cell->setObstacle($entity->getObstacle());
                        $cell->setMonster(0);
                        $cell->setTrigger(0);
                        $map[$i][$j] = $cell;
                    }
                }    
            }
            $session->set('map', $map);
            $state = $session->get('state');
            $mapid = $session->get('mapid');
            return $this->render('default/admin/cell.html.twig', [
                'map'   =>$map,
                'state' => $state,
                'mapid' =>$mapid,
            ]);

        }

        $mapid = $session->get('mapid');
        $state = $session->get('state');

        return $this->render('default/admin/emptyCell.html.twig', [
            'map' => $map,
            'entity' => $entity,
            'form' => $form->createView(),
            'dico' => $dictionary->getLabelDecoration(),
            'state' => $state,
            'mapid'=>$mapid,
            ]);

    }

    /**
     * @Route("/admin/map/empty", name="admin_map_empty")
     */
    public function mapEmptyAction(){

        $session = $this->get('session');

        $map = $session->get('map');

        $x = count($map);
            $y = count($map[0]);
            for($i = 0; $i < $x; $i++){
                for($j = 0; $j < $y; $j++){
                    if($map[$i][$j] !== null){
                        $map[$i][$j] = null;
                    }
                }    
            }
            $session->set('map', $map);
            $state = $session->get('state');
            $mapid = $session->get('mapid');
            return $this->render('default/admin/cell.html.twig', [
                'map'=>$map,
                'state'=>$state,
                'mapid'=>$mapid,
            ]);

    }

    /**
     * @Route("/admin/map/generate", name="admin_map_generate")
     */
    public function mapGenerateAction(){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $zone = $session->get('zone');

        $map = $session->get('map');

        $content = json_encode($map, JSON_FORCE_OBJECT);

        $zone->setMapContent($content);

        $em->persist($zone);
        $em->flush();

        echo 'carte crée';



        die;

    }

    /**
     * @Route("/admin/map/list", name="admin_map_list")
     */
    public function mapListAction(){

        $em = $this->getDoctrine()->getManager();

        $listMap = $em->getRepository('AppBundle:Map')->findAll();

//        $listMap = $em->getRepository('AppBundle:Map')->findBy([
//            'type'=> 2,
//            ]);

        return $this->render('default/admin/mapList.html.twig', [
            'maps'=>$listMap,
            ]);
    }


    /**
     * @Route("/admin/map/display/{id}", name="admin_map_display")
     */
    public function mapDisplayAction($id){

        $chemin = dirname(__FILE__).'/../../../web/Ressources/zones.txt';

        if(file_exists($chemin)){
            $file = json_decode(file_get_contents($chemin));
        }

        $mapJSON = "";

        foreach ($file as $key => $zone) {
            if($zone->id == $id){
                $mapJSON = json_decode($zone->mapContent);
            }
        }

        $map = "";
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

        $session = $this->get('session');

        $session->set('map', $map);
        $session->set('state', 'update');
        $session->set('mapid', $id);

        return $this->render('default/admin/cell.html.twig', [
            'map'=>$map,
            'state' => 'update',
            'mapid' => $id,
            ]);


    }

    /**
     * @Route("/admin/map/update/{id}", name="admin_map_update")
     */
    public function mapUpdateAction($id){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $zone = $em->getRepository('AppBundle:Map')->find($id);

        $map = $session->get('map');

        $content = json_encode($map, JSON_FORCE_OBJECT);

        $zone->setMapContent($content);
        $zone->setDateInfo(null);

        $em->persist($zone);
        $em->flush();

        echo 'carte modifiée';



        die;

    }


    /**
     * @Route("/admin/map/main/new", name="admin_map_main_new")
     */
    public function mapMainNewAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $entity = new Map();

        $dictionary = new Dictionary();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('mapName', TextType::class)
            ->add('type', ChoiceType::class, array(
                'choices' => $dictionary->getLabelMapContent(),
            ))
            ->add('mapContent', TextType::class)
            ->add('genener la carte', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $entity->setKeyid(0);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_map_main_show', array(
                'id' => $entity->getId(),
                )));
        }

        return $this->render('default/admin/adminMainMapNew.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/map/show/{id}", name="admin_map_main_show")
     */
    public function mapMainShowAction($id){

        $em = $this->getDoctrine()->getManager();

        $map = $em->getRepository('AppBundle:Map')->findOneBy([
            'id' => $id,
            ]);

        return $this->render('default/admin/adminMainMapShow.html.twig', [
            'map'=>$map,
            ]);
    }


    

}