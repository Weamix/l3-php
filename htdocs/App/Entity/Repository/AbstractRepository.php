<?php

namespace App\Entity\Repository;
use App\Entity\EntityInterface;
use \PDO;


abstract class AbstractRepository implements RepositoryInterface,EntityInterface
{

    protected $table_name;
    protected $class_name;

    function getConnexion()
    {
        // return connexion pdo
        return \Connexion::instance();
    }

    /**
     * @return EntityInterface[]
     */
    public function findAll() : array
    {
        //fetch class
        $sql = "SELECT * from $this->table_name";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, $this->class_name);
    }

    /**
     * @param int $id
     * @return EntityInterface
     */
    public function find(int $id) : EntityInterface
    {
        //TODO return class filtré par id

        $sql = $this->getConnexion()->prepare("SELECT * FROM $this->table_name WHERE id= :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetchObject($this->class_name);
    }

    /**
     * @param $column
     * @param $value
     * @return EntityInterface[]
     */
    public function findBy($column, $value) : array
    {
        $sql = "SELECT * FROM  $this->table_name WHERE $column = $value";
        $query = $this->getConnexion()->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, $this->class_name);
    }
}