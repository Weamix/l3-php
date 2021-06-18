<?php

namespace App\Controller;

use App\Entity\Product;

class CatalogController extends AbstractController
{

    public function view()
    {
        $list_product = [];
        $list_product_by_id= [];

        $productRepo = new \App\Entity\Repository\ProductRepository();
        $list_product = $productRepo->findAll();

        $list_product_by_id = $productRepo->findBy('price',100);

        $this->render('catalogue/view.phtml', ['products' => $list_product , 'products_by_id' => $list_product_by_id]);
    }

    public function viewProduct(){
        $productRepo = new \App\Entity\Repository\ProductRepository();
        $product = $productRepo->find(1);
        $this->render("catalogue/viewProduct.phtml", ['product' => $product]);
        //echo "view product";
    }
}