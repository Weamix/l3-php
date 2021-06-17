
<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;

class Product extends AbstractRepository implements RepositoryInterface
{
    /**
     * @return EntityInterface[]
     */
    public function findAll() : array
    {

        //TODO return all row from table
        $products = [];

        foreach ($this->getConnexion()->query('SELECT * from products') as $row) {
            $product = new \App\Entity\Product($row['name'], $row['price']);
            array_push($products, $product);
        }

        return $products;
    }

    /**
     * @param int $id
     * @return \App\Entity\Product
     */
    public function find(int $id) : EntityInterface
    {
        //TODO return produit filtré par id
    }

    /**
     * @param $column
     * @param $value
     * @return EntityInterface[]
     */
    public function findBy($column, $value) : array
    {
        //TODO return produit filtré par id
    }
}