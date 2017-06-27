<?php
namespace MultiServiceGsm\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MultiServiceGsm\FrontBundle\Entity\Adresse;


class AdresseController extends Controller
{
  public function addAction(Request $request)
  {
    $adresse = new Adresse();
    $form = $this->createForm('MultiServiceGsm\FrontBundle\Form\AdresseType', $adresse);
    $form->handleRequest($request);

    if ( ($form->isSubmitted() ) && ($form->isValid()) ) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($adresse);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice','Adresse bien enregistrée.');

      return $this->redirectToRoute('fos_user_profile_show', array('id' => $adresse->getId()));
    }

    return $this->render('MultiServiceGsmFrontBundle:Adresse:add.html.twig', array(
    		'adresse' =>$adresse,
    	    'form' => $form->createView(),
    ));
  }
}
