<?php


namespace App\Controller;


class CatalogController extends AbstractController
{
    public function view(){
        //echo "view catalog";
        $list_product = [
            ["name"=>"product1"],
            ["name"=>'product2'],
            ["name"=>'product3']
        ];
        echo $this->render('catalog/view.phtml', ['products' => $list_product]);
    }

    public function viewProduct(){
        $product = [
            ["name"=>"product_example"]
        ];
        echo $this->render('catalog/viewProduct.phtml', ['product' => $product]);
        //echo "view product";
    }

}