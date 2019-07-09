<?php

namespace WebShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WebShopBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/User")
 */

class UserController extends Controller
{
    /*
       public function indexAction()
       {
           return $this->render('WebShopBundle/Default/users.html.twig');
       }
       */

    /**
     * @Route("/Add")
     */

    public function addUser()
    {
        $user = new User();
        $user -> setName('Alberto4');
        $user -> setEmail('Alberto4.cuvi@gmail.com');
        $user -> setPassword('asdfg4');

        $user -> setCreateAt(new \DateTime('now'));
        $user -> setUpdateAt(new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em -> persist($user);
        $em -> flush();

        return new Response("Se ha generado el usuario numero " . $user->getId());
    }


    /**
     * @Route("/GetAll")
     */

    public function getAllUser()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('WebShopBundle:User');
        $users = $repository->findAll();
        return $this->render('@WebShop/Default/users.html.twig', ['users'=>$users]);
    }
}
