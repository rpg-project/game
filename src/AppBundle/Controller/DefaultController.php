<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Capacities;
use AppBundle\Entity\Followers;
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

        $messages = $this->resource();

        return $this->render('default/index.html.twig', [
            'nbCharacters' => $nbCharacter,
            'messages' => $messages,
        ]);
    }

    public function resource(){

        $em = $this->getDoctrine()->getManager();

        $maj = [
            'Informations' => ['table' => Infos::class, 'champ'=> 'dateInfo','file'=>'infos.txt'],
            'Items' => ['table' => Items::class, 'champ'=> 'dateInfo','file'=>'items.txt'],
            'Capacities' => ['table' => Capacities::class, 'champ'=> 'dateInfo','file'=>'capacities.txt'],
            'Followers' => ['table' => Followers::class, 'champ'=> 'dateInfo','file'=>'followers.txt'],
            ];

        $messages = array();
        $x=0;

        foreach ($maj as $key => $value){
            $messages[$x]['title'] = 'Ecriture de '.$key;

            $data = $em->getRepository($value['table'])->findBy([
                $value['champ'] => null,
                ]);

            $table = $em->getRepository($value['table'])->findAll();

            $chemin = dirname(__FILE__) . '/../../../web/Ressources/'.$value['file'];

            $file = json_decode(file_get_contents($chemin));

            $messages[$x]['nbfiles'] = count($file);
            $messages[$x]['nbTables'] = count($table);

            if(count($data) > 0 || !file_exists($chemin) || count($file) !== count($table) ) {

                $messages[$x]['result'] = 'Génération fichier '.$value['file'];
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

                $handle = fopen($chemin, "w");
                fputs($handle, $content);
                fclose($handle);
            } else {
                $messages[$x]['result'] = "pas de nouvel ajout";
            }
            $x++;
        }

        return $messages;
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
