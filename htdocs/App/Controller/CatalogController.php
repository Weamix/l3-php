<?php

namespace App\Controller;

use App\Entity\Product;

class CatalogController extends AbstractController
{

    public function view()
    {
        $list_product = [];

        $productRepo = new \App\Entity\Repository\Product();
        $list_product = $productRepo->findAll();

        $this->render('catalogue/view.phtml', ['products' => $list_product]);
    }

    public function viewProduct(){
        $productRepo = new \App\Entity\Repository\Product();
        $product = $productRepo->find(1);
        $this->render("catalogue/viewProduct.phtml", ['product' => $product]);
        //echo "view product";
    }
}