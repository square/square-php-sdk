<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Indicates how Square delivers the [invoice](#type-Invoice) to the customer.
 */
class InvoiceDeliveryMethod
{
    /**
     * Directs Square to send the invoice, reminders, and receipts to the customer using email.
     */
    public const EMAIL = 'EMAIL';

    /**
     * Directs Square to take no action on the invoice. In this case, the seller
     * or application developer follows up with the customer for payment. For example,
     * a seller might collect a payment in the Seller Dashboard or Point of Sale (POS) application.
     * The seller might also share the URL of the Square-hosted invoice page (`public_url`) with the
     * customer to request payment.
     */
    public const SHARE_MANUALLY = 'SHARE_MANUALLY';
}
