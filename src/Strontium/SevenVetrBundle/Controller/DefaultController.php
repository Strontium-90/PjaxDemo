<?php

namespace Strontium\SevenVetrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('StrontiumSevenVetrBundle:Default:index.html.twig', array('name' => $name));
    }
}
