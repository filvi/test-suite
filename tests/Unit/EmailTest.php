<?php declare(strict_types=1);

namespace tests\Units;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\Template\InvalidArgumentException;
use src\Email;

final class EmailTest extends TestCase
{


    protected function setUp(): void
    {
        parent::setUp();
        echo "insert stubs here, used to initialize class with this";
    }

    public function testCanBeCreatedFromValidEmail(): void
    {
        $string = 'user@example.com';

        $email = Email::fromString($string);

        $this->assertSame($string, $email->asString());
    }

    public function testCannotBeCreatedFromInvalidEmail(): void
    {
        // this has to be defined before the exception would stop the execution
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    // Adding data provider in this test ---------------------------------------


}