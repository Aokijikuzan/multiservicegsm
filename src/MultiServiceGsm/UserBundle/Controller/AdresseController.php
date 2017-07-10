<?php
namespace MultiServiceGsm\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MultiServiceGsm\UserBundle\Entity\Adresse;
use MultiServiceGsm\UserBundle\Entity\User;



class AdresseController extends Controller
{
  public function addAction(Request $request)
  {
    $adresse = new Adresse();
    $form = $this->createForm('MultiServiceGsm\UserBundle\Form\AdresseType', $adresse);
    $form->handleRequest($request);

      
    if ( ($form->isSubmitted() ) && ($form->isValid()) ) {
      $em = $this->getDoctrine()->getManager();
      $user=$this->getUser();
      $adresse->setUtilisateur($user);
      $em->persist($adresse);
      
      $em->flush();

      $request->getSession()->getFlashBag()->add('success','Adresse bien enregistrée.');

      return $this->redirectToRoute('fos_user_profile_show');
    }
    
    return $this->render('MultiServiceGsmUserBundle:Adresse:PageAdressePostale.html.twig', array(
    		'adresse' =>$adresse,
    	    'form' => $form->createView(),
    ));
  }
}
