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
        /*return $this->render('@WebShop/Default/index.html.twig');*/
        return $this->render('base.html.twig');
    }
}
