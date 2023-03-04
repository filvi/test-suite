<?php declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use src\Email;
use tests\DataProviders\ExampleDP;

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

    /**
     * @test
     * @dataProvider customDataProvider
     */
    public function testCanBeCreatedFromValidEmailAndDataProvider(
        string      $string,
        bool|string $comparison
    ): void
    {

        $email = Email::fromString($string);

        $toCompare = !$comparison ? $email->asString() : $comparison;

        // AssertSame is === and AssertEquals is == ----------------------------
        $this->assertSame($string, $toCompare);
    }

    // Here is static just to get rid of an error, it does not need to be
    public static function customDataProvider(): array
    {
        return [
            ["user@example.com", false],
            ["asdasda@example.com", "asdasda@example.com"],
            // ["userexample.com", ], // this will fail ------------------------
            // ["asdasd@example.com", "asdasd@asd.asd"] // this also will fiail


        ];
    }


    /**
     * @test
     * @dataProvider \tests\DataProviders\ExampleDP::importedCases
     */
    public function testImportDP(
        string      $string,
        bool|string $comparison
    ): void
    {
        new DataProviderExternal('\tests\DataProviders\ExampleDP','importedCases');

        $email = Email::fromString($string);

        $toCompare = !$comparison ? $email->asString() : $comparison;

        // AssertSame is === and AssertEquals is == ----------------------------
        $this->assertSame($string, $toCompare);
    }


}