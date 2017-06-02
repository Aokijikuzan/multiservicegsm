<?php

namespace MultiServiceGsm\FrontBundle\Controller;
use MultiServiceGsm\FrontBundle\Entity\Modele;
use MultiServiceGsm\FrontBundle\Entity\Tarif;
use MultiServiceGsm\FrontBundle\Entity\Reparation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;



class FicheReparationController extends Controller
{

	public function ficheAction(Modele $modele)
    {
        $em = $this->getDoctrine()->getManager();


 	
        
        $tarifs = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findByModel($modele);
        //return $this->render('MultiServiceGsmFrontBundle:Marque:Apple.html.twig', array(
       //     'modeles' => $modeles
       return $this-> render('MultiServiceGsmFrontBundle:Modele:affichReparations.html.twig',array('tarifs'=>$tarifs));

    }
}