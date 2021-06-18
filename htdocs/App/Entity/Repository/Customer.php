<?php

namespace App\Entity\Repository;

use App\Entity\EntityInterface;
use \PDO;

class Customer extends AbstractRepository implements RepositoryInterface,EntityInterface
{
    /**
     * @return EntityInterface[]
     */
    public function findAll() : array
    {
        //fetch class
        $sql = "SELECT * from customers";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, \App\Entity\Customer::class);
    }

    /**
     * @param int $id
     * @return \App\Entity\Customer
     */
    public function find(int $id) : EntityInterface
    {
        //TODO return customer filtré par id

        $sql = $this->getConnexion()->prepare('SELECT * FROM customers WHERE id= :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetchObject(\App\Entity\Customer::class);
    }

    /**
     * @param int $id
     * @return EntityInterface[]
     */
    public function findBy($column, $value) : array
    {
        $sql = "SELECT * FROM customers WHERE $column = $value";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, \App\Entity\Customer::class);
    }
}