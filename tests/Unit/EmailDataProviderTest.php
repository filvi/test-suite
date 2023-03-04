<?php  declare(strict_types=1);

namespace tests\Units;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use src\Email;



final class EmailDataProviderTest extends TestCase
{


    /** -----------------------------------------------------------------------
     * Data Provider - Annotation - internal method - PHP < 8
     * ---------------------------------------------------------------------- */


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
        $this->assertSame($string, $toCompare);
    }




    /** -----------------------------------------------------------------------
     * Data Provider - Annotation - External Class with method - PHP < 8
     * ---------------------------------------------------------------------- */


    /**
     * @test
     * @dataProvider \tests\DataProviders\ExampleDataProvider::importedCases
     */
    public function testImportDP(
        string      $string,
        bool|string $comparison
    ): void
    {
        $email = Email::fromString($string);
        $toCompare = !$comparison ? $email->asString() : $comparison;
        $this->assertSame($string, $toCompare);
    }


    /** -----------------------------------------------------------------------
     * Data Provider - Annotation - internal method - PHP >= 8
     * ---------------------------------------------------------------------- */


    #[DataProvider('customDataProvider')]
    public function testDataProviderWithAnnotation(
        string      $string,
        bool|string $comparison
    ): void
    {
        $email = Email::fromString($string);
        $toCompare = !$comparison ? $email->asString() : $comparison;
        $this->assertSame($string, $toCompare);
    }


    /** -----------------------------------------------------------------------
     * Data Provider - Annotation - External Class with method  - PHP >= 8
     * ---------------------------------------------------------------------- */


    #[DataProviderExternal('\tests\DataProviders\ExampleDataProvider','importedCases2')]
    public function testImportDataProviderWithAnnotation(
        string      $string,
        bool|string $comparison
    ): void
    {

        $email = Email::fromString($string);
        $toCompare = !$comparison ? $email->asString() : $comparison;
        $this->assertSame($string, $toCompare);
    }


    /** -----------------------------------------------------------------------
     * Defining internal Data Provider for use in iternal method
     * Data Provider must be static, public  and return a [[]] or Iterator
     * ---------------------------------------------------------------------- */


    public static function customDataProvider(): array
    {
        return [
            "email string use Email::fromString method" => ["user@example.com", false],
            "email string VS string comparison" => ["asdasda@example.com", "asdasda@example.com"],
            // "this will fail no email set" => ["userexample.com", ""], // this will fail
            // "this will fail different string" => ["asdasd@example.com", "asdasd@asd.asd"] // this also will fail


        ];
    }


}