<?php

namespace App\Entity\Repository;

class ProductRepository extends AbstractRepository
{
    public function __construct(){
        $this->table_name = "products";
        $this->class_name = \App\Entity\Product::class;
    }
}