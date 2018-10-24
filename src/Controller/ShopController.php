<?php declare(strict_types = 1);

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; //leave

class ShopController extends AbstractController
{
    /** @Route ("/customer", name="customer") */
    public function selectCustomer()
    {
        $customers = $this->getDoctrine()->getManager()->getRepository(Customer::class)->findAll();
        
        return $this->render(
            'select_customer.html.twig',
            [
                'customers' => $customers,
            ]
        );
    }

    /** @Route ("/window", name="window") */
    public function displayWindow()
    {
        return new Response('Window');
    }

    /** @Route ("/add/{id}", name="add") */
    public function addToBasket(int $id)
    {
        return new Response('Add to basket '.$id);
    }

    /** @Route ("/checkout", name="checkout") */
    public function checkout()
    {
        return new Response('Checkout');
    }
}