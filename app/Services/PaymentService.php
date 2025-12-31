<?php

namespace App\Services;

use App\Models\Order;

class PaymentService
{
    /**
     * Get redirect URL based on payment method
     */
    public function getRedirectUrl(Order $order, string $paymentMethod): string
    {
        switch ($paymentMethod) {
            case 'credit_debit':
                return $this->creditDebitRedirect($order);

            case 'tabby':
                return $this->tabbyRedirect($order);

            default:
                throw new \InvalidArgumentException("Unsupported payment method: {$paymentMethod}");
        }
    }

    /**
     * CREDIT/DEBIT
     */
    protected function creditDebitRedirect(Order $order)
    {
        // TODO: implement credit/debit gateway logic
        return 'https://google.com';
    }

    /**
     * TABBY
     */
    protected function tabbyRedirect(Order $order)
    {
        // TODO: implement Tabby API logic
        return 'https://google.com';
    }
}
