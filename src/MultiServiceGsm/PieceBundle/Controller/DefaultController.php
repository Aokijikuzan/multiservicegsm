<?php

namespace MultiServiceGsm\PieceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MultiServiceGsmPieceBundle:Default:index.html.twig');
    }
}
