<?php

namespace MultiServiceGsm\FrontBundle\Controller;
use MultiServiceGsm\FrontBundle\Entity\Modele;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApplController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
/*
        $marques = $em->getRepository('MultiServiceGsmFrontBundle:Marque')->findAll(); 
        return $this->render('MultiServiceGsmFrontBundle:Default:index.html.twig', array( 'marques' =>$marques ));
*/
        $modeles = $em->getRepository('MultiServiceGsmFrontBundle:Modele')->findAll();
        return $this->render('MultiServiceGsmFrontBundle:Marque:Apple.html.twig', array(
            'modeles' => $modeles
        ));
    }
   
}