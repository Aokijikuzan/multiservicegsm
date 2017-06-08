<?php

namespace MultiServiceGsm\FrontBundle\Controller;
use MultiServiceGsm\FrontBundle\Entity\Modele;
use MultiServiceGsm\FrontBundle\Entity\Marque;
use MultiServiceGsm\FrontBundle\Entity\Reparation;
use MultiServiceGsm\FrontBundle\Entity\Tarif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RepaModelController extends Controller
{
    public function repAction( $marque, $modele)
    {
        $em = $this->getDoctrine()->getManager();

        //$marques = $em->getRepository('MultiServiceGsmFrontBundle:Marque')->findBySlug($marque);

        $modeles = $em->getRepository('MultiServiceGsmFrontBundle:Modele')->findBySlug($modele);

 	//	$reparations = $em->getRepository('MultiServiceGsmFrontBundle:Reparation')->findAll();
        
        $tarifs = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findByModel($modeles);
        //return $this->render('MultiServiceGsmFrontBundle:Marque:Apple.html.twig', array(
       //     'modeles' => $modeles
       return $this-> render('MultiServiceGsmFrontBundle:Modele:affichReparations.html.twig',
       	array('tarifs'=>$tarifs,
       			'modele'=>$modeles,
       			'marque'=>$marque
       				));

    }
   
}