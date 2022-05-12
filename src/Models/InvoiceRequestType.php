<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the type of the payment request. For more information, see
 * [Payment requests](https://developer.squareup.com/docs/invoices-api/overview#payment-requests).
 */
class InvoiceRequestType
{
    /**
     * A request for a balance payment. The balance amount is computed as follows:
     *
     * - If the invoice specifies only a balance payment request, the balance amount is the
     * total amount of the associated order.
     * - If the invoice also specifies a deposit request, the balance amount is the amount
     * remaining after the deposit.
     *
     * `INSTALLMENT` and `BALANCE` payment requests are not allowed in the same invoice.
     */
    public const BALANCE = 'BALANCE';

    /**
     * A request for a deposit payment. You have the option of specifying
     * an exact amount or a percentage of the total order amount. If you request a deposit,
     * it must be due before any other payment requests.
     */
    public const DEPOSIT = 'DEPOSIT';

    /**
     * A request for an installment payment. Installments allow buyers to pay the invoice over time.
     * Installments can optionally be combined with a deposit.
     *
     * Adding `INSTALLMENT` payment requests to an invoice requires an
     * [Invoices Plus subscription](https://developer.squareup.com/docs/invoices-api/overview#invoices-plus-
     * subscription).
     */
    public const INSTALLMENT = 'INSTALLMENT';

    private const _ALL_VALUES = [self::BALANCE, self::DEPOSIT, self::INSTALLMENT];

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
