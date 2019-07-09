<?php

namespace WebShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/home")
 */

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('WebShopBundle:User');
        $users = $repository->findAll();
        return $this->render('@WebShop/Default/index.html.twig', ['users'=>$users]);
        /*return $this->render('base.html.twig');*/
    }
}
