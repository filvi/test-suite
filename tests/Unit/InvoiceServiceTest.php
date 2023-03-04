<?php declare(strict_types=1);


use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;


class InvoiceServiceTest extends TestCase
{


    #[DataProvider('customDataProvider')]
    public function testIfReturnsFloat(
        string $customer, float $amount
    ): void
    {
        $invoice = new InvoiceService();

        $toTest = $invoice->process($customer, $amount);

        $this->assertIsFloat($toTest);
    }

    public static function customDataProvider(): array
    {
        return [
            ["Filippo", 20.20],
            ["Giovanni", 12.20]
        ];

    }
}
