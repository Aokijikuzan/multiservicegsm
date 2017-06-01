<?php

namespace MultiServiceGsm\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MultiServiceGsm\UserBundle\Entity\User as User;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use FOS\UserBundle\Doctrine\UserManager;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MultiServiceGsmFrontBundle:Default:index.html.twig');
    }
    public function deleteUserAction(User $user)
    {
    		$userManager = $this->container->get('fos_user.user_manager');
        $userManager->deleteUser($user);
        $this->get('session')->getFlashBag()->add('success', $user->getUsername() . ' effacé');
        return $this->redirect($this->generateUrl('multi_service_gsm_front_homepage'));	
    }
}
