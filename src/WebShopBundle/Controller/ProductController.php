<?php

namespace WebShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WebShopBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/Product")
 */
class ProductController extends Controller
{
    /*
       public function indexAction()
       {
           return $this->render('WebShopBundle/Default/products.html.twig');
       }
       */

    /**
     * @Route("/Add")
     */

    public function addProduct()
    {
        $product = new Product();
        $product -> setModel('Casual5');
        $product -> setBrand('Rayban5');
        $product -> setPrice('39,30');
        $product -> setQuantity('5');
        $product -> setType('SunGlasses');
        $product -> setImage('glass5.jpg');

        $product -> setCreateAt(new \DateTime('now'));
        $product -> setUpdateAt(new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em -> persist($product);
        $em -> flush();

        return new Response("Se ha generado el producto numero " . $product->getId());
    }


    /**
     * @Route("/GetAll")
     */

    public function getAllProduct()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('WebShopBundle:Product');
        $products = $repository->findAll();
        return $this->render('@WebShop/Default/products.html.twig', ['products'=>$products]);
    }
}
