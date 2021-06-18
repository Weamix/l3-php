<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use \PDO;

class ProductRepository extends AbstractRepository
{
    public function __construct(){
        $this->table_name = "products";
        $this->class_name = \App\Entity\Product::class;
    }
}