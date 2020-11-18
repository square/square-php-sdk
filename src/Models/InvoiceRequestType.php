<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Indicates the type of the payment request. An invoice supports the following payment request
 * combinations:
 * - 1 balance
 * - 1 deposit with 1 balance
 * - 2 - 12 installments
 * - 1 deposit with 2 - 12 installments
 *
 * For more information,
 * see [Payment requests](https://developer.squareup.com/docs/invoices-api/overview#payment-requests).
 */
class InvoiceRequestType
{
    /**
     * Identifies that the payment request is for the balance amount, after accounting for any
     * other payment requests in the invoice:
     *
     * - If the invoice specifies only a balance payment request, it refers to the
     * total amount identified by the associated order.
     * - If the invoice also specifies a deposit request, the balance payment request refers to
     * the remaining amount.
     * - `INSTALLMENT` and `BALANCE` are not allowed together.
     */
    public const BALANCE = 'BALANCE';

    /**
     * Identifies that the payment request is for a deposit. You have the option of specifying
     * an exact amount or a percentage of the total order amount. If you request a deposit,
     * it must be due before any other payment requests.
     */
    public const DEPOSIT = 'DEPOSIT';

    /**
     * Identifies that the payment request is for an installment. An invoice can request payments in
     * installments.
     * Along with installments, you can request an optional deposit. All these payment requests must add to
     * the total order amount.
     */
    public const INSTALLMENT = 'INSTALLMENT';
}
