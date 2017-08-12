<?php

namespace MultiServiceGsm\PiecesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MultiServiceGsmPiecesBundle:Default:index.html.twig');
    }
}
