<?php

namespace MultiServiceGsm\FrontBundle\Controller;

use MultiServiceGsm\FrontBundle\Entity\Reparation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reparation controller.
 *
 */
class ReparationController extends Controller
{
    /**
     * Lists all reparation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reparations = $em->getRepository('MultiServiceGsmFrontBundle:Reparation')->findAll();

        return $this->render('reparation/index.html.twig', array(
            'reparations' => $reparations,
        ));
    }

    /**
     * Creates a new reparation entity.
     *
     */
    public function newAction(Request $request)
    {
        $reparation = new Reparation();
        $form = $this->createForm('MultiServiceGsm\FrontBundle\Form\ReparationType', $reparation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reparation);
            $em->flush();

            return $this->redirectToRoute('Reparation_show', array('id' => $reparation->getId()));
        }

        return $this->render('reparation/new.html.twig', array(
            'reparation' => $reparation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reparation entity.
     *
     */
    public function showAction(Reparation $reparation)
    {
        $deleteForm = $this->createDeleteForm($reparation);

        return $this->render('reparation/show.html.twig', array(
            'reparation' => $reparation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reparation entity.
     *
     */
    public function editAction(Request $request, Reparation $reparation)
    {
        $deleteForm = $this->createDeleteForm($reparation);
        $editForm = $this->createForm('MultiServiceGsm\FrontBundle\Form\ReparationType', $reparation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Reparation_show', array('id' => $reparation->getId()));
        }

        return $this->render('reparation/edit.html.twig', array(
            'reparation' => $reparation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reparation entity.
     *
     */
    public function deleteAction(Request $request, Reparation $reparation)
    {
        $form = $this->createDeleteForm($reparation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reparation);
            $em->flush();
        }

        return $this->redirectToRoute('Reparation_index');
    }

     public function deleteRepaAction(Reparation $reparation)
    {
     $em=$this->getDoctrine()->getManager();
     $em->remove($reparation);
     $em->flush();
      return $this->redirectToRoute('Reparation_index');
    }

    /**
     * Creates a form to delete a reparation entity.
     *
     * @param Reparation $reparation The reparation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reparation $reparation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Reparation_delete', array('id' => $reparation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
