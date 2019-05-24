<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="app_home_index")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {
        $products = $em->getRepository(Product::class)->findAll();

        if ($request->isMethod('POST')) {

            if ($filterTva = $request->get('filter_tva')) {

                return $this->render('product/dashboard.html.twig', [
                    'products' => $products,
                    'filterTva' => $request->get('filter_tva')
                ]);
            }
        }

        return $this->render('product/dashboard.html.twig', [
            'products' => $products,
            'filterTva' => Product::PERCENT_HT
        ]);
    }
}
