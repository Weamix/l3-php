<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customers",name="customers")
     * @return Response
     */
    public function viewAll(): Response
    {
        /*$entityManager = $this->getDoctrine()->getManager();
        $customer = new Customer();
        $customer -> setLastname("test");
        $customer -> setFirstname("test");
        $customer -> setAge(18);

        $entityManager -> persist($customer);
        $entityManager->flush();*/

        $customerRepository = $this->getDoctrine()->getRepository(Customer::class);
        $customers = $customerRepository->findAll();

        return $this->render('customers.html.twig', [
            'customers' => $customers
        ]);
    }

    /**
     * @Route("/customers/customer",name="customer")
     * @return Response
     */
    public function showCustomer(): Response
    {

        $customerRepository = $this->getDoctrine()->getRepository(Customer::class);
        $customer = $customerRepository->findOneBy(['lastname'=>'test']);

        return $this->render('customer.html.twig', [
            'customer' => $customer
        ]);
    }


    /**
     * @Route("/customers/{id}",name="customerid")
     * @param int $id
     * @param CustomerRepository $customerRepository
     * @return Response
     */
    public function showCustomerId(int $id,CustomerRepository $customerRepository)
    {
        return $this->render('customer.html.twig', [
            'customer' => $customerRepository->find($id)
        ]);
    }

}