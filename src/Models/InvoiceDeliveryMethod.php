<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates how Square delivers the [invoice]($m/Invoice) to the customer.
 */
class InvoiceDeliveryMethod
{
    /**
     * Directs Square to send invoices, reminders, and receipts to the customer using email.
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

    /**
     * Directs Square to send invoices and receipts to the customer using SMS (text message).
     *
     * You cannot set `SMS` as a delivery method using the Invoices API, but you can change an `SMS`
     * delivery method to `EMAIL` or `SHARE_MANUALLY`.
     */
    public const SMS = 'SMS';

    private const _ALL_VALUES = [self::EMAIL, self::SHARE_MANUALLY, self::SMS];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|null|string $value Value or a list of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        ApiHelper::checkValueInEnum($value, self::class, self::_ALL_VALUES);
        return $value;
    }
}
