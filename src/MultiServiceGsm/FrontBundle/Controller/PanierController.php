<?php

namespace MultiServiceGsm\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PanierController extends Controller
{
	public function panierAction()
	{
		return $this->render('MultiServiceGsmFrontBundle:Panier:Panier.html.twig');
	}
	public function livraisonAction()
	{
		return $this->render('MultiServiceGsmFrontBundle:Panier:livraison.html.twig');
	}
}