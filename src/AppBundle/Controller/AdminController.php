<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Entity\Zone;
use AppBundle\Entity\Cell;
use AppBundle\Entity\Dictionary;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\DateTime;

class AdminController extends Controller
{
	/**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {
    	return $this->render('default/admin.html.twig');
    }

    /**
     * @Route("/admin/new/map", name="admin_new_map")
     */
    public function newMapAction(Request $request)
    {

    	$entity = new Zone();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('width', TextType::class)
            ->add('height', TextType::class)
            ->add('genener la carte', SubmitType::class, array('attr'=> array('class' => "btn btn-primary")));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            return $this->redirect($this->generateUrl('admin_map_show', array(
            	'width' => $entity->getWidth(),
            	'height' => $entity->getHeight()
            	)));
        }

        return $this->render('default/adminMap.html.twig', array(
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

    	$map = array();
    	for($i=0;$i<$height;$i++){
    		$map[$i] = array();
    		for($j=0;$j<$width;$j++){
    			$map[$i][$j]=null;
    		}
    	}

    	$session->set('map', $map);



    	return $this->render('default/cell.html.twig', [
    		'map'=>$map,
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
        $listTriggers['none'] = null;
        foreach ($triggers as $key => $trigger) {
            $listTriggers[$trigger->getTitle()] = $trigger->getId();
        }

    	$entity = new Cell();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
        	->add('x', TextType::class, array('data' => $x))
        	->add('y', TextType::class, array('data' => $y))
            ->add('decoration', TextType::class)
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
        	return $this->render('default/cell.html.twig', [
    		'map'=>$map,
    		]);

        }

                 //echo '<pre>'.print_r($map, true).'</pre>';

    	return $this->render('default/cellContent.html.twig', [
			'map' => $map,
    		'entity' => $entity,
    		'form' => $form->createView(),
            'dico' => $dictionary->getLabelDecoration(),
            'monsters' => $monsters,
    		]);

    }

    /**
     * @Route("/admin/map/emptyCell", name="admin_map_empty_cell")
     */
    public function mapEmptyCellAction(Request $request){

         $em = $this->getDoctrine()->getManager();

        $session = $this->get('session');

        $map = $session->get('map');

        //echo '<pre>'.print_r($map, true).'</pre>';

        $entity = new Cell();

        $dictionary = new Dictionary();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $entity);

        $formBuilder
            ->add('decoration', TextType::class)
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
                        $cell->setMonster(0);
                        $cell->setTrigger(0);
                        $map[$i][$j] = $cell;
                    }
                }    
            }
            $session->set('map', $map);
            return $this->render('default/cell.html.twig', [
            'map'=>$map,
            ]);

        }

        return $this->render('default/emptyCell.html.twig', [
            'map' => $map,
            'entity' => $entity,
            'form' => $form->createView(),
            'dico' => $dictionary->getLabelDecoration(),
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
            return $this->render('default/cell.html.twig', [
            'map'=>$map,
            ]);

    }

}