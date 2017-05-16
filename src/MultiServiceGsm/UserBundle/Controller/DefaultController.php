<?php

namespace MultiServiceGSM\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MultiServiceGSMUserBundle:Default:index.html.twig');
    }
}
