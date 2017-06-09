<?php
namespace MultiServiceGsm\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MultiServiceGsm\UserBundle\Entity\User as User;
use MultiServiceGsm\UserBundle\Entity\Utilisateur ;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FormType;
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

    public function recherchAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $userManager = $this->container->get('fos_user.user_manager');
        $Utilisateur=$em->getRepository('MultiServiceGsmUserBundle:Utilisateur')->findByUser($user);
        return $this->render('/Utilisateur/profilU.html.twig', array('utilisateur'=>$utilisateur)
            );
    }
    
  

}
