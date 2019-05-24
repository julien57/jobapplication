<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="app_home_index")
     *
     * @param Request                $request
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function indexAction(Request $request, EntityManagerInterface $em): Response
    {
        $products = $em->getRepository(Product::class)->findAll();

        if ($request->isMethod('POST')) {
            if ($filterTva = $request->get('filter_tva')) {
                return $this->render('product/dashboard.html.twig', [
                    'products' => $products,
                    'filterTva' => $request->get('filter_tva'),
                ]);
            }
        }

        return $this->render('product/dashboard.html.twig', [
            'products' => $products,
            'filterTva' => Product::PERCENT_HT,
        ]);
    }
}
