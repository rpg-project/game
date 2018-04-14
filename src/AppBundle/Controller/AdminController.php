<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
	/**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {


    	return $this->render('default/admin.html.twig');
    }

}