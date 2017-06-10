<?php

namespace MultiServiceGsm\FrontBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PanierController extends Controller
{
	public function panierAction()
	{
		$session = $this->get('session');
        if (!$session->has('panier'))
        {
            $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findById(array_keys($session->get('panier')));
     
        return $this->render('MultiServiceGsmFrontBundle:Panier:Panier.html.twig', array('produits' => $produits,'panier' => $session->get('panier')));

       
	}
	


    public function livraisonAction()
	{
		return $this->render('MultiServiceGsmFrontBundle:Panier:livraison.html.twig');
	}
	


    public function validationAction()
    {
        return $this->render('MultiServiceGsmFrontBundle:Panier:validation.html.twig');
    }
    


    public function ajoutAction($id)
    {
    	$session=$this->get('session');
        if(!$session->has('panier'))
        {
             $session->set('panier',array());
        }
         $panier = $session->get('panier');
         //$panier[ID du PRODUIT] =>QUANTITE
         //si le produit est dans le panier
         
         if(!array_key_exists($id, $panier))
         {
            
                $panier[$id]=1;

         }else
         {
            $panier[$id]=$panier[$id]+1;
         }
        
        $session->set('panier',$panier);

        return $this->redirect($this->generateUrl('multi_service_gsm_front_panier')); 
    }
    
    public function supprimAction($id)
    {
    	$session=$this->get('session');
        $panier = $session->get('panier');
         if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }
        return $this->redirect($this->generateUrl('multi_service_gsm_front_panier')); 
    }
}