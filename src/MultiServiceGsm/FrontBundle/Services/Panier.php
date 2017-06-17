<?php

namespace MultiServiceGsm\FrontBundle\Services;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManager;
class Panier
{
	public $session;
	private $em;
	public function __contsruct(Session $session, EntityManager $entityManager)
	{
		$this->session=$this->container->get('session');
		$this->em=$entityManager;
	}
	public function contenu()
	{
		$session = $this->session;
		var_dump($this->session);die();
        if (!$session->has('panier'))
        {
            $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('MultiServiceGsmFrontBundle:Tarif')->findById(array_keys($session->get('panier')));
     	return $produits;
	}

}