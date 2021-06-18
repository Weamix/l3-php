<?php

namespace App\Entity\Repository;


class CustomerRepository extends AbstractRepository
{
    public function __construct(){
        $this->table_name = "customers";
        $this->class_name = \App\Entity\Customer::class;
    }
}