<?php

namespace WebShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WebShopBundle\Entity\Product;

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
        $product -> setModel('Casual');
        $product -> setBrand('Rayban');
        $product -> setPrice('99,30');
        $product -> setQuantity('3');
        $product -> setType('SunGlasses');

        $product -> setCreateAt(new \DateTime('now'));
        $product -> setUpdateAt(new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em -> persist($product);
        $em -> flush();

        return new Response("Se ha generado un nuevo producto" . $product->getId());
    }
}
