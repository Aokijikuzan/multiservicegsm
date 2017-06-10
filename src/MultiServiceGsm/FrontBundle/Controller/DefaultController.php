<?php

namespace MultiServiceGsm\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $marques = $em->getRepository('MultiServiceGsmFrontBundle:Marque')->findAll(); 
        
        return $this->render('MultiServiceGsmFrontBundle:Default:index.html.twig', array( 'marques' =>$marques ));
    }
    public function infAction()
    {
		return $this->render('MultiServiceGsmFrontBundle:Default:pageInfo.html.twig');
	}

    public function devAction()
    {
        return $this->render('MultiServiceGsmFrontBundle:Default:affichDevis.html.twig');
    }

    public function marqAction()
    {
         $em = $this->getDoctrine()->getManager();

        $marques = $em->getRepository('MultiServiceGsmFrontBundle:Marque')->findAll();
        return $this->render('MultiServiceGsmFrontBundle:Default:pageMarque.html.twig',array('marques'=>$marques));
    }
    public function localisationAction()
    {
        return $this->render('MultiServiceGsmFrontBundle:Default:nousTrouver.html.twig');
    }
    
}
