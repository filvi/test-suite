<?php declare(strict_types=1);

namespace src\FakeClasses;

use http\Exception\InvalidArgumentException;

class EmailService
{
    public function send(string $customer, string $modelName){


//            sleep(1);  // this is to simulate an API call
        if ($customer){
            return "email with model $modelName sent to $customer"; // here I am faking tha sending of an email
        } else {
            // this is just to throw some exception has no menaning
            throw new InvalidArgumentException("Customer is not set",0,null);
        }
    }

}