<?php declare(strict_types=1);

namespace FakeClasses;

use http\Exception\InvalidArgumentException;

class SalesTaxService
{
    public function calculate(float $amount, string $customer): float
    {
//        sleep(1);  // this is to simulate an API call
        if ($customer){
            return  $amount * 22 / 100;
        } else {
            // this is just to throw some exception has no meaning
            throw new InvalidArgumentException("Customer is not set",0,null);
        }

    }
}