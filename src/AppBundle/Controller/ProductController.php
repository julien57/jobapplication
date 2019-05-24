<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produit")
 */
class ProductController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/ajout", name="app_product_add")
     */
    public function add(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($product);
            $this->em->flush();

            $this->addFlash('notice', 'Produit ajouté !');
            $this->redirectToRoute('homepage');
        }

        return $this->render('product/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
