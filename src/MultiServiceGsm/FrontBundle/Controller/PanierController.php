<?php

namespace MultiServiceGsm\FrontBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use MultiServiceGsm\UserBundle\Entity\Adresse;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use MultiServiceGsm\UserBundle\Form\AdresseType;

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
	


    public function recapitulatifAction(Request $request)
	{
        $adresse= new Adresse();
        $session = $this->get('session');
    //    $panier=$this->get('');
        $form= $this->createForm('MultiServiceGsm\UserBundle\Form\AdresseType',$adresse); 
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $authChecker= $this->container->get('security.authorization_checker');
        $produits = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findById(array_keys($session->get('panier')));

        $ttc = 0;
        $articles = array();

        foreach ($produits as $article) {
            # code...
            $ttc=$ttc + ($article->getPrix() * ($session->get('panier')[$article->getId()]));

            $articles[] = array ('name' => $article->__ToString(), 
                'description'=> $article->__ToString(),
                'quantity' => $session->get('panier')[$article->getId()],
                'price'=> number_format($article->getPrix(), 2, '.',''),
                'currency' => 'EUR');
        }
        $articles = json_encode($articles);
        $session->set('commande',$articles);
              $session->set('ttc',$ttc);

       /*
        if(!$session->has('adresse'))
        {
          */
          if( $form->isSubmitted() && $form->isValid()  )
          {
          
              if ($authChecker->isGranted('IS_AUHENTIFICATED_REMEMBERED'))
               {
                
                  $user=$this->getUser();
                  $adrese->setUtilisateur($user);
                  $em->persist($adresse);
                  $em->flush(); 
                  $session->set('adresse',$adresse);
                  
                  $paye=$this->get('multi_service_gsm_front.paypal');
                  $lien=$paye->getPaymentToken($ttc,$articles)['links'][1]->href;
              //    return $this->redirect($this->generateUrl('multi_service_gsm_front_validation')); 

                  return $this->render('MultiServiceGsmFrontBundle:Panier:validation.html.twig',array('produits' => $produits,'panier' => $session->get('panier'),'lien'=> $lien));
              }
              $paye=$this->get('multi_service_gsm_front.paypal');
              $lien=$paye->getPaymentToken($ttc,$articles)['links'][1]->href;
              $session->set('adresse',$adresse);
             //  return $this->redirect($this->generateUrl('multi_service_gsm_front_validation')); 
              
              return $this->render('MultiServiceGsmFrontBundle:Panier:validation.html.twig',array('produits' => $produits,'panier' => $session->get('panier'),'lien'=> $lien));
       
        }
        /*
        $paye=$this->get('multi_service_gsm_front.paypal');
        $lien=$paye->getPaymentToken($ttc,$articles)['links'][1]->href;
        $session->set('adresse',$adresse);
       //  return $this->redirect($this->generateUrl('multi_service_gsm_front_validation')); 
        
        return $this->render('MultiServiceGsmFrontBundle:Panier:validation.html.twig',array('produits' => $produits,'panier' => $session->get('panier'),'lien'=> $lien));
      }
        */
		return $this->render('MultiServiceGsmFrontBundle:Panier:livraison.html.twig', array('produits' => $produits,'panier' => $session->get('panier'),
            'form'=>$form->createView(),'adresse' => $session->get('adresse')
            ));

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
            $session->set('panier',$panier);
            $session->set('quantite',$quantite);
        //  var_dump($quantite);die();

        }
          if ($quantite == 0)
           { if (array_key_exists($id, $panier))
              {
             unset($panier[$id]);
               $session->set('panier',$panier);
              $session->set('quantite',$quantite);
             }
            }
         /*
            if ($quantite == 0)
           { 
             unset($panier[$id]);
              $session->set('panier',$panier);
              $session->set('quantite',$quantite);
            
            }
            */
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
         //   var_dump($quantite);die();
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

   





    public function livraisonAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $this->getUser();
        $entity=new Adresse();
         $session = $this->get('session');
        $session->set('adresses',array());
        $adresses=$em->getRepository('MultiServiceGsmUserBundle:Adresse')->findByUtilisateur($utilisateur);
       $form=$this->createForm(AdresseType::class,$entity);
        $session->set('adresses',$adresses );
            
          $form->handleRequest($request);
        if($request->isMethod('POST'))
        {
            if ($form->isSubmitted() && ($form->isValid()) )
            {
                $em = $this->getDoctrine()->getManager();
                $entity->setUtilisateur($utilisateur);
                $em->persist($entity);
                $em->flush();
                return $this->redirect($this->generateUrl('multi_service_gsm_adresse_livraison'));
            }
        }
     /*   
        var_dump($adresses[0]);die();
    */  
         return $this->render('MultiServiceGsmFrontBundle:Panier:adresseLivraison.html.twig',array('nom' => $adresses[0]->getNom(),'prenom'=>$adresses[0]->getPrenom(),'rue'=>$adresses[0]->getRue(),'complement'=>$adresses[0]->getComplement(),'ville'=>$adresses[0]->getVille(),'codepostal'=>$adresses[0] ->getCodepostal(),
            'telephone'=>$adresses[0]->getTelephone(),'adresses' => $session->get('adresses'), 'form'=>$form));
    }
    public function livraisonOnSession()
    {
         $session = $this->get('session');
        if(!$session->has('adresse'))
        {
            $session->set('adresse',array());
        }
        $adresse=$session->get('adresse');
        if($this->get('request')->get('livraison') !=null)
        {
            $adresse['livraison']=$this->getRequest()->get('livraison');
        }else{
            return $this->redirect($this->generateUrl('multi_service_gsm_front_validation'));
        }
    }
   

    public function validationAction(Request $request)
    {
      
        if($request->isMethod()=='POST')
        {
            $this->livraisonOnSession();
        }
       return $this->redirect($this->generateUrl('multi_service_gsm_front_recapitulatif'));
    }
      
}