<?php declare(strict_types=1);

use FakeClasses\SalesTaxService;
use src\FakeClasses\EmailService;
use src\FakeClasses\PaymentGatewayService;

class InvoiceService
{
    public function process(string $customer, float $amount): float
    {
        $salesTaxService = new SalesTaxService();
        $gatewayService = new PaymentGatewayService();
        $emailService = new EmailService();
        // 1. calculate sales tax
        $tax = $salesTaxService->calculate($amount, $customer);
        // 2. process invoice
        if (!$gatewayService->charge($customer, $amount, $tax)) {
            return false;
        }
        // 3. send receipt
        $emailService->send($customer, 'receipt');

        echo "########################";
        return $tax;
    }
}