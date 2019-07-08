<?php

namespace WebShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WebShopBundle\Entity\User;


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
        $user -> setName('Alberto');
        $user -> setEmail('Alberto.cuvi@gmail.com');
        $user -> setPassword('asdfg');

        $user -> setCreateAt(new \DateTime('now'));
        $user -> setUpdateAt(new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em -> persist($user);
        $em -> flush();

        return new Response("Se ha generado un nuevo usuario" . $user->getId());
    }


    /**
     * @Route("/GetAll")
     */

    public function getAllUser()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('WebShopBundle:User');
        $users = $repository->findAll();
        return $this->render('@User/Default/users.html.twig', ['users'=>$users]);
    }
}
