<?php

namespace App\Controller;

use App\Entity\Customer;

class CustomerController extends AbstractController
{

    public function view()
    {
        $customers = [];
        $customer_by_id = [];
        $customer_by_column = [];

        $customerRepo = new \App\Entity\Repository\Customer();
        $customers = $customerRepo->findAll();

        $customer_by_id = $customerRepo->find(1);

        //$customer_by_column = $customerRepo->findBy('lastname','test');

        $this->render('customer/viewCustomer.phtml', ['customers' => $customers ,'customer_by_id' => $customer_by_id, 'customer_by_column' => $customer_by_column]);
    }
}