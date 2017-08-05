<?php
namespace MultiServiceGsm\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MultiServiceGsm\UserBundle\Entity\Adresse;
use MultiServiceGsm\UserBundle\Entity\User;



class AdresseController extends Controller
{
  //ajouter une adressse postal d'un user
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

      $request->getSession()->getFlashBag()->add('success','Adresse postale bien enregistrée.');

      return $this->redirectToRoute('fos_user_profile_show');
    }
    
    return $this->render('MultiServiceGsmUserBundle:Adresse:PageAdressePostale.html.twig', array(
    		'adresse' =>$adresse,
    	    'form' => $form->createView(),
    ));
  }
  //afficher tous les adresses postale d'un user
  public function showAction()
  {
   // $form-*>handleRequest($request);
    
       $em=$this->getDoctrine()->getManager();
       $user=$this->getUser();
       $adresse=$em->getRepository('MultiServiceGsmUserBundle:Adresse')->findByUtilisateur($user);
       //var_dump($adresse);die();
       return $this->render('MultiServiceGsmUserBundle:Adresse:show.html.twig',array(
        'adresses'=>$adresse
        ));
  } 

  //supprimer une adresse postale
  public function deleteAction(Adresse $adresse)
  {
     $em=$this->getDoctrine()->getManager();
    $em->remove($adresse);
    $em->flush();
     $request->getSession()->getFlashBag()->add('success','Adresse postale bien supprimée.');
    return $this->redirectToRoute('multi_service_gsm_user_show_adresse');
  }
  //modifier une adresse postale
  public function modifAction(Request $request,Adresse $adresse)
  {
    $form= $this->createDeleteForm($adresse);
    $modifForm=$this->createForm('MultiServiceGsm\UserBundle\Form\AdresseType',$adresse);
    $modifForm->handleRequest($request);
   // var_dump($modifForm);die();
    if($modifForm->isSubmitted() && $modifForm->isValid())
    {
      $this->getDoctrine()->getManager()->flush();
      return $this->redirectToRoute('multi_service_gsm_user_show_adresse',array('id'=>$adresse->getId()));
    }
    return $this->render('MultiServiceGsmUserBundle:Adresse:modifAdresse.html.twig',array(
      'adresse'=>$adresse,
      'modi_form'=>$modifForm->createView(),
      'formF'=>$form->createView(),
    ));
  }
  private function createDeleteForm(Adresse $adresse)
  {
    return $this->createFormBuilder()
                ->setAction($this->generateUrl('multi_service_gsm_user_show_adresse',array('id'=>$adresse->getId())))
                ->setMethod('DELETE')
                ->getForm()
    ;
  }
}
