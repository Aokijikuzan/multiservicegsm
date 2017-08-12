<?php

namespace MultiServiceGsm\PiecesBundle\Controller;

use MultiServiceGsm\PiecesBundle\Entity\Piece;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Piece controller.
 *
 */
class PieceController extends Controller
{
    /**
     * Lists all piece entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pieces = $em->getRepository('MultiServiceGsmPiecesBundle:Piece')->findAll();

        return $this->render('piece/index.html.twig', array(
            'pieces' => $pieces,
        ));
    }

    /**
     * Creates a new piece entity.
     *
     */
    public function newAction(Request $request)
    {
        $piece = new Piece();
        $form = $this->createForm('MultiServiceGsm\PiecesBundle\Form\PieceType', $piece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($piece);
            $em->flush();

            return $this->redirectToRoute('piece_show', array('id' => $piece->getId()));
        }

        return $this->render('piece/new.html.twig', array(
            'piece' => $piece,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a piece entity.
     *
     */
    public function showAction(Piece $piece)
    {
        $deleteForm = $this->createDeleteForm($piece);

        return $this->render('piece/show.html.twig', array(
            'piece' => $piece,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing piece entity.
     *
     */
    public function editAction(Request $request, Piece $piece)
    {
        $deleteForm = $this->createDeleteForm($piece);
        $editForm = $this->createForm('MultiServiceGsm\PiecesBundle\Form\PieceType', $piece);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('piece_edit', array('id' => $piece->getId()));
        }

        return $this->render('piece/edit.html.twig', array(
            'piece' => $piece,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a piece entity.
     *
     */
    public function deleteAction(Request $request, Piece $piece)
    {
        $form = $this->createDeleteForm($piece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($piece);
            $em->flush();
        }

        return $this->redirectToRoute('piece_index');
    }

    /**
     * Creates a form to delete a piece entity.
     *
     * @param Piece $piece The piece entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Piece $piece)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('piece_delete', array('id' => $piece->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function pieceAction()
    {
         $em = $this->getDoctrine()->getManager();
         $session=$this->get('session');
         $findPiece = $em->getRepository('MultiServiceGsmPiecesBundle:Piece')->findBy(array('disponible'=> 1));
         if(!$session->has('panier'))
         {
            $session->set('panier',array());
         }else
         {
            $panier = $session->get('panier');
         }
         $nbPieceDispo= count($findPiece);

         $pieceParPage=10;
         var_dump($findPiece);die();
         return $this->render('MultiServiceGsmPiecesBundle:Defaults:affichPiece.html.twig',array('findPiece'=>$findPiece));
    }
}
