<?php

namespace MultiServiceGsm\FrontBundle\Services;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManager;
class Panier
{
	private $session;
	private $em;
	public function __contsruct(Session $session, EntityManager $entityManager)
	{
		$this->session=$session;
		$this->em=$entityManager;
	}
	public function contenu()
	{
		$session = $this->session;
		
        if (!$session->has('panier'))
        {
            $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findById(array_keys($session->get('panier')));
     	return $produits;
	}

}