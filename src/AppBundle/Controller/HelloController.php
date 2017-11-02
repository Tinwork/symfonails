<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class HelloController extends Controller {

    
    public function indexAction(Request $request) {
        return new Response("Hello World ! ".$request->get('name'));
    } 

    /**
     * @Route("/test/{name}", name="hello")
     */
    public function helloAction(Request $request)
    {
        return new Response("Hello World ! ".$request->get('name'));
    }
}