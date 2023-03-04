<?php declare(strict_types=1);

namespace src\FakeClasses;

use http\Exception\InvalidArgumentException;


class PaymentGatewayService
{
    /**
     * @param string $customer
     * @param float $amount
     * @param float $tax
     * @return float
     */
    public function charge (string $customer, float $amount, float $tax) : float
    {

        if($customer){

//            sleep(1);  // this is to simulate an API call
            return $amount + $tax;
        } else {
            // this is just to throw some exception has no meaning
            throw new InvalidArgumentException("Customer is not set",0,null);
        }

    }

}