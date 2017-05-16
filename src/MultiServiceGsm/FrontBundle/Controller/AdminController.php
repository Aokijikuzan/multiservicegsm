<?php

namespace MultiServiceGsm\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
	 public function indexAction()
    {
        return $this->render('admin/index.html.twig');
    }
}