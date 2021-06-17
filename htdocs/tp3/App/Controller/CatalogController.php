<?php


namespace App\Controller;
use App\Entity\Product;


class CatalogController extends AbstractController
{
    public function view(){
        //echo "view catalog";
        $list_product = [];

        //$list_product[] = new Product('Product1', 1);
        //$list_product[] = new Product('Product2', 2);
        $productRepo = new \App\Entity\Repository\Product();
        $list_product = $productRepo->findAll();

        $this->render('catalogue/view.phtml', ['products' => $list_product]);
    }

    public function viewProduct(){
        $product = [
            ["name"=>"product_example"]
        ];
        $this->render("catalog/viewProduct.phtml", ['product' => $product]);
        //echo "view product";
    }

}