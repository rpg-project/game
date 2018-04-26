<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Infos;
use AppBundle\Entity\Items;
use AppBundle\Repository\InfosRepository;
use AppBundle\Repository\ItemsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $session = new Session();

        $user = $entityManager->getRepository('AppBundle:Users')->find(2);

        $session->set('user', $user);

        $character = $entityManager->getRepository('AppBundle:Characters')->findOneBy([
            'userid' => $user->getId(),
        ]);

        $nbCharacter = count($character);

        if($nbCharacter !== 0){
            $session->set('character', $character);
        }

        $this->resource();

        return $this->render('default/index.html.twig', [
            'nbCharacters' => $nbCharacter
        ]);
    }

    public function resource(){

        $em = $this->getDoctrine()->getManager();

        $maj = [
            'info' => ['table' => Infos::class, 'champ'=> 'dateInfo','file'=>'infos.txt'],
            'item' => ['table' => Items::class, 'champ'=> 'dateInfo','file'=>'items.txt'],
            ];

        foreach ($maj as $key => $value){
            echo 'Ecriture de '.$key.'<br/>';

            $data = $em->getRepository($value['table'])->findBy([
                $value['champ'] => null,
                ]);

            if(count($data) > 0 ) {
                /** @var InfosRepository $results */
                /** @var ItemsRepository $results */
                $results = $em->getRepository($value['table'])->findAll();
                $arr = [];
                foreach ($results as $key => $result) {

                    if ($result->getDateInfo() === null) {
                        $result->setDateInfo(new \DateTime('now'));
                        $em->persist($result);
                        $em->flush();
                    }
//                    $reflect = new ReflectionClass($result);
//                    $result   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);

                    $arr[$key] =  $this->object_to_array($result);

                }
               $content = json_encode($arr);

                $chemin = dirname(__FILE__) . '/../../../web/Ressources/'.$value['file'];

                $handle = fopen($chemin, "w");
                fputs($handle, $content);
                fclose($handle);
            } else {
                echo 'pas de nouvel ajout';
            }
        }
        return;
    }

    function object_to_array($obj) {
        $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
        $arr = array();
        foreach ($_arr as $key => $val) {
            $val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
            $arr[$key] = $val;
        }
        return $arr;
    }
}
