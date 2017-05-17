<? php

namespace MultiServiceGsm\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoController extends Controller
{
	public function indexAction()
	{
		return $this->render('infominut.html.twig');
	}
}