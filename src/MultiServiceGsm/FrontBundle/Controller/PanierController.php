<?php

namespace MultiServiceGsm\FrontBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PanierController extends Controller
{
	public function panierAction()
	{//$var=$this->get('multi_service_gsm_front.panier');
        $var=$this->contenu();
      //  var_dump($var);die('ee');
        $session = $this->get('session');
        if (!$session->has('panier'))
        {
            $session->set('quantite',0);//creationde la variable
            $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findById(array_keys($session->get('panier')));
        return $this->render('MultiServiceGsmFrontBundle:Panier:Panier.html.twig', array('produits' => $produits,'panier' => $session->get('panier')));

       
	}
	


    public function recapitulatifAction()
	{
        
        $session = $this->get('session');
        if (!$session->has('panier'))
        {
           
                $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findById(array_keys($session->get('panier')));
     
		return $this->render('MultiServiceGsmFrontBundle:Panier:livraison.html.twig', array('produits' => $produits,'panier' => $session->get('panier'))
        );
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
             $session->set('quantite',0);
        }
         $quantite=$session->get('quantite');
         $panier = $session->get('panier');
         //$panier[ID du PRODUIT] =>QUANTITE
         //si le produit est dans le panier
         
         if(!array_key_exists($id, $panier))
         {
                $quantite=$quantite+1;
                $panier[$id]=1;

         }else
         {
            $panier[$id]=$panier[$id]+1;
              $quantite=$quantite+1;
         }
        $session->set('quantite',$quantite);
        $session->set('panier',$panier);
       //var_dump($quantite);die();
        return $this->redirect($this->generateUrl('multi_service_gsm_front_panier')); 
    }
    public function supprimAction($id)
    {
         $session=$this->get('session');
        $panier = $session->get('panier');
        $quantite=$session->get('quantite');
         if (array_key_exists($id, $panier))
        {
              $quantite=$quantite-1;
              $panier[$id]=$panier[$id]-1;

        }
         
          if ($quantite == 0)
           { if (array_key_exists($id, $panier))
              {
             unset($panier[$id]);
               $session->set('panier',$panier);
              $session->set('quantite',$quantite);
             }
            }
          $session->set('panier',$panier);
          $session->set('quantite',$quantite);

           return $this->redirect($this->generateUrl('multi_service_gsm_front_panier')); 
    }
    
   

    public function supprimttAction($id)
    {
        $session=$this->get('session');
        $panier = $session->get('panier');
        $quantite=$session->get('quantite');
         if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $quantite=$quantite-1;
            $session->set('panier',$panier);
            $session->set('quantite',$quantite);
            var_dump($quantite);die();
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }
        return $this->redirect($this->generateUrl('multi_service_gsm_front_panier')); 
    }
    public function contenu()
    {
        $session = $this->get('session');

        if (!$session->has('panier'))
        {
            $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findById(array_keys($session->get('panier')));
        return $produits;
    }
}