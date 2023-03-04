<?php declare(strict_types=1);
namespace tests\DataProviders;

class ExampleDataProvider
{
    // example of imported to keep code clean
    public static function importedCases(

    ): array
    {
        return [
            ["user@example.com", false],
            ["asdasda@example.com", "asdasda@example.com"]
            // ["userexample.com", null ], // this will fail ------------------------
            // ["asdasd@example.com", "aaa@asd.asd"] // this also will fail


        ];
    }

    public static function importedCases2(

    ): array
    {
        return [
            ["user@example.com", false],
            ["asdasda@example.com", "asdasda@example.com"]
            // ["userexample.com", null ], // this will fail ------------------------
            // ["asdasd@example.com", "aaa@asd.asd"] // this also will fail


        ];
    }
}