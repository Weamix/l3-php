<?php

namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class CatalogController extends AbstractController
{
    /**
     * @Route("/catalog",name="catalog")
     * @return Response
     */
    public function index(): Response
    {
        /*return new Response(
            '<html><body>Home page</body></html>'
        );*/

        /*$entityManager = $this->getDoctrine()->getManager();
        $product = new Product();
        $product -> setName("Tapis");
        $product -> setPrice(10);
        $entityManager -> persist($product);
        $entityManager->flush();*/

        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $products = $productRepository->findAll();

        //var_dump($products);
        //var_dump($productRepository2);

        return $this->render('catalog.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/catalog/product/{id}",name="productid")
     * @param int $id
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function showProductId(int $id,ProductRepository $productRepository)
    {
        return $this->render('catalog.product.html.twig', [
            'product' => $productRepository->find($id)
        ]);
    }

    /**
     * @Route("/catalog/product",name="product")
     * @return Response
     */
    public function showProduct(): Response
    {

        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $product = $productRepository->findOneBy(['name'=>'Tapis']);

        return $this->render('catalog.product.html.twig', [
            'product' => $product
        ]);
    }
}