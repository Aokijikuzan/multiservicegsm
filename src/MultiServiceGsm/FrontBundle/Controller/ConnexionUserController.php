<?php

namespace MultiServiceGsm\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnexionUserController extends Controller
{
    public function ConnexAction()
    {
        return $this->render('MultiServiceGsmUserBundle:Default:pageConnexionUser.html.twig');
    }
}
