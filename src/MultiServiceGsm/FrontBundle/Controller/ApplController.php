<?php

namespace MultiServiceGsm\FrontBundle\Controller;
use MultiServiceGsm\FrontBundle\Entity\Modele;
use MultiServiceGsm\FrontBundle\Entity\Marque;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApplController extends Controller
{
    public function appAction(Marque $marque)
    {
        $em = $this->getDoctrine()->getManager();
/*
        $marques = $em->getRepository('MultiServiceGsmFrontBundle:Marque')->findById(); 
        return $this->render('MultiServiceGsmFrontBundle:Default:index.html.twig', array( 'marques' =>$marques ));
        ));
*/
        $modeles = $em->getRepository('MultiServiceGsmFrontBundle:Modele')->findByMarque($marque);
        //return $this->render('MultiServiceGsmFrontBundle:Marque:Apple.html.twig', array(
       //     'modeles' => $modeles
        return $this-> render('MultiServiceGsmFrontBundle:Marque:affichModele.html.twig',array('modeles' => $modeles));
    }
   
}