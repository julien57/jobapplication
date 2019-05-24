<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function add(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($product);
            $this->em->flush();

            $this->addFlash('notice', 'Produit ajouté !');
            return $this->redirectToRoute('app_home_index');
        }

        return $this->render('product/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/editer/{id}", name="app_product_edit")
     *
     * @param Product $product
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function edit(Product $product, Request $request)
    {
        $form = $this->createForm(ProductType::class, $product)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->flush();

            $this->addFlash('notice', 'Produit modifié !');
            return $this->redirectToRoute('app_home_index');
        }

        return $this->render('product/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
