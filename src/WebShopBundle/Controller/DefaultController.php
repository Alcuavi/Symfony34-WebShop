<?php

namespace WebShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ShopBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/")
 */

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebShopBundle/Default/index.html.twig');
    }
}
