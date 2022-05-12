<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the automatic payment method for an [invoice payment request]($m/InvoicePaymentRequest).
 */
class InvoiceAutomaticPaymentSource
{
    /**
     * An automatic payment is not configured for the payment request.
     */
    public const NONE = 'NONE';

    /**
     * Use a card on file as the automatic payment method. On the due date, Square charges the card
     * for the amount of the payment request.
     *
     * For `CARD_ON_FILE` payments, the invoice delivery method must be `EMAIL` and `card_id` must be
     * specified for the payment request before the invoice can be published.
     */
    public const CARD_ON_FILE = 'CARD_ON_FILE';

    /**
     * Use a bank account on file as the automatic payment method. On the due date, Square charges the
     * bank
     * account for the amount of the payment request.
     *
     * This payment method applies only to recurring invoices that sellers create in the Seller Dashboard
     * or other
     * Square first-party applications. The bank account is provided by the customer during the payment
     * flow.
     *
     * You cannot set `BANK_ON_FILE` as a payment method using the Invoices API, but you can change a
     * `BANK_ON_FILE`
     * payment method to `NONE` or `CARD_ON_FILE`. For `BANK_ON_FILE` payments, the invoice delivery method
     * must be `EMAIL`.
     */
    public const BANK_ON_FILE = 'BANK_ON_FILE';

    private const _ALL_VALUES = [self::NONE, self::CARD_ON_FILE, self::BANK_ON_FILE];

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
