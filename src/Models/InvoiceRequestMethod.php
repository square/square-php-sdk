<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Specifies the action for Square to take for processing the invoice. For example,
 * email the invoice, charge a customer's card on file, or do nothing.
 */
class InvoiceRequestMethod
{
    /**
     * Directs Square to email the invoice to the customer after the invoice is published
     * (either immediately or at the `scheduled_at` time, if specified in the [invoice](#type-invoice)).
     */
    public const EMAIL = 'EMAIL';

    /**
     * Directs Square to charge the card on file, on the `due_date`, specified in the payment request
     * after the invoice is published.
     */
    public const CHARGE_CARD_ON_FILE = 'CHARGE_CARD_ON_FILE';

    /**
     * Directs Square to take no specific action on the invoice. In this case, the seller
     * (or the application developer) follows up with the customer for payment. For example,
     * a seller might collect a payment in the Seller Dashboard or use the Point of Sale (POS) application.
     * The seller might also share the URL of the Square-hosted invoice page (`public_url`) with the
     * customer requesting payment.
     */
    public const SHARE_MANUALLY = 'SHARE_MANUALLY';
}
