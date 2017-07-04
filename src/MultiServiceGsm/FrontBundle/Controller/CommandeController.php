<?php

namespace MultiServiceGsm\FrontBundle\Controller;
use MultiServiceGsm\FrontBundle\Entity\Commande;
use MultiServiceGsm\FrontBundle\Entity\Marque;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CommandeController extends Controller
{
	


	 public function facturePdfAction()
    {
      $session=$this->get('session');
      $adresse=$session->get('adresse');
    	
      $commande=new Commande();
      $commande->setDate(new \DateTime());
    	$commande->setUtilisateur($this->getUser());
    	$commande->setDetail("éa  flg,  azzz");
    	$commande->setEtat(1);
    //	var_dump($commande->getDetail());die();
      $html = $this->renderView('MultiServiceGsmFrontBundle:Panier:facture.html.twig', array('date' => $commande->getDate(),'utilisateur'=> $commande->getUtilisateur(), 'detail' =>  $commande->getDetail() ,  'etat' => 	$commande->getEtat(), 'adresse'=>$adresse ));
         
    $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(15, 5, 15, 5));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($html);
    $html2pdf->output();
   }

   public function paypalAction()
   {
      $paye=$this->get('multi_service_gsm_front.paypal');
      $lien=$paye->getPaymentToken(12,null)['links'][1]->href;
     return $this->redirect(); 
   }


   public function paiementConfirmeAction(Request $request)
   {
     $session = $request->getSession();
    $paye=$this->get('multi_service_gsm_front.paypal');
    
    $reponse=$paye->executePayment($request->query->get('paymentId'), $request->query->get('PayerID'));

    if (isset($reponse['name']) && $reponse['name']=="PAYMENT_ALREADY_DONE")
    {
     $session->getFlashBag()->add('info', 'Paiement déja réalisé');
     return $this->redirect($this->generateUrl('multi_service_gsm_front_homepage')); 
    }
    if (isset($reponse['state']) && $reponse['state']!="approved"){
       $session->getFlashBag()->add('info', 'Paiement non effectué!!!');
        return $this->redirect($this->generateUrl('multi_service_gsm_front_homepage')); 
    }

    $commande=new Commande();
    $commande->setDate(new \DateTime());
      $commande->setUtilisateur($this->getUser());
      $commande->setDetail($session->get('commande'));
      $commande->setEtat(1);
      $em = $this->getDoctrine()->getManager();
      $em->persist($commande);
      $em->flush(); 
      $session->remove('panier');
       $session->remove('quantite');
     $session->getFlashBag()->add('success', 'Paiement bien enregistrée');
      return $this->redirect($this->generateUrl('multi_service_gsm_front_homepage')); 
   }

   public function paiementEchoueAction()
   {

   }
}