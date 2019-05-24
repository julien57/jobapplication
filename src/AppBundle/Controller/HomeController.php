<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="app_home_index")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {
        $products = $em->getRepository(Product::class)->findAll();

        return $this->render('product/dashboard.html.twig', [
            'products' => $products
        ]);
    }
}
