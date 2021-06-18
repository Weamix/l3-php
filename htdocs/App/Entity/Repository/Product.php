<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use \PDO;

class Product extends AbstractRepository implements RepositoryInterface,EntityInterface
{
    /**
     * @return EntityInterface[]
     */
    public function findAll() : array
    {
        //TODO return all row from table
        //$products = [];

        /*foreach ($this->getConnexion()->query('SELECT * from products') as $row) {
          $product = new \App\Entity\Product($row['name'], $row['price']);
          array_push($products, $product);
        }
        return $products;*/

        //fetch class
        $sql = "SELECT * from products";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, \App\Entity\Product::class);
    }

    /**
     * @param int $id
     * @return \App\Entity\Product
     */
    public function find(int $id) : EntityInterface
    {
        //TODO return produit filtré par id
        /*
        $request = $this->getConnexion()->prepare("SELECT * FROM products WHERE id = :id");
        $request->bindParam(':id', $id);
        $request->execute();
        $result = $request->fetch();
        return new \App\Entity\Product($result['name'], $result['price']);
        */

        $sql = $this->getConnexion()->prepare('SELECT * FROM products WHERE id= :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetchObject(\App\Entity\Product::class);
    }

    /**
     * @param int $id
     * @return EntityInterface[]
     */
    public function findBy($column, $value) : array
    {
        $sql = "SELECT * FROM products WHERE $column = $value";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, \App\Entity\Product::class);
    }
}