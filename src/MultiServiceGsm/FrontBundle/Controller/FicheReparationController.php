<?php

namespace MultiServiceGsm\FrontBundle\Controller;
use MultiServiceGsm\FrontBundle\Entity\Modele;
use MultiServiceGsm\FrontBundle\Entity\Tarif;
use MultiServiceGsm\FrontBundle\Entity\Reparation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;



class FicheReparationController extends Controller
{

       
	public function ficheAction($marque, $modele, $reparation)
    {
        $em = $this->getDoctrine()->getManager();

        $model  = $em->getRepository('MultiServiceGsmFrontBundle:Modele')->findOneBy(array('slug'=>$modele));
        $reparations= $em->getRepository('MultiServiceGsmFrontBundle:Reparation')->findOneBy(array('slug'=>$reparation));
        $tarifs = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findByModel($model);
        //return $this->render('MultiServiceGsmFrontBundle:Marque:Apple.html.twig', array(
       //     'modeles' => $modeles
        $tmp=null;
        foreach ($tarifs as $t) {
        	
        	if($t->getReparation() == $reparations)
        	{
        		$tmp=$t;
        		
        		break;
        	}
        }
        
       

       return $this-> render('MultiServiceGsmFrontBundle:Default:pageFicheReparation.html.twig',
       	array('tarifs'=>$tmp));

    }
}