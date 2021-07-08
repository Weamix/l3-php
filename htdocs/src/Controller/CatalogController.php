<?php

namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class CatalogController extends AbstractController
{
    /**
     * @Route("/catalog",name="catalog")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
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

        $product = new Product();
        $product->setName('test');
        $product->setPrice(10);

        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $products = $productRepository->findAll();

        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class)
            ->add('price', IntegerType::class)
            ->add('save', SubmitType::class, ['label' => 'Create product'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $product = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager -> persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('catalog');
        }

        //var_dump($products);
        //var_dump($productRepository2);

        return $this->render('catalog.html.twig', [
            'products' => $products,
            'form' => $form->createView()
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