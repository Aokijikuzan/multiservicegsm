<?php

namespace MultiServiceGsm\FrontBundle\Controller;
use MultiServiceGsm\FrontBundle\Entity\Modele;
use MultiServiceGsm\FrontBundle\Entity\Marque;
use MultiServiceGsm\FrontBundle\Entity\Reparation;
use MultiServiceGsm\FrontBundle\Entity\Tarif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RepaModelController extends Controller
{
    public function repAction(Marque $marque,Modele $modele)
    {
        $em = $this->getDoctrine()->getManager();

        $modeles = $em->getRepository('MultiServiceGsmFrontBundle:Modele')->findByMarque($marque);

 		$reparations = $em->getRepository('MultiServiceGsmFrontBundle:Reparation')->findAll();
        
        $tarif = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findByModel($modele);
        //return $this->render('MultiServiceGsmFrontBundle:Marque:Apple.html.twig', array(
       //     'modeles' => $modeles
       return $this-> render('MultiServiceGsmFrontBundle:Modele:affichReparations.html.twig',array('modeles' => $modeles,'tarif'=>$tarif,$marque));

    }
   
}