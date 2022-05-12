<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the Square product used to process a transaction.
 */
class TransactionProduct
{
    /**
     * Square Point of Sale.
     */
    public const REGISTER = 'REGISTER';

    /**
     * The Square Connect API.
     */
    public const EXTERNAL_API = 'EXTERNAL_API';

    /**
     * A Square subscription for one of multiple products.
     */
    public const BILLING = 'BILLING';

    /**
     * Square Appointments.
     */
    public const APPOINTMENTS = 'APPOINTMENTS';

    /**
     * Square Invoices.
     */
    public const INVOICES = 'INVOICES';

    /**
     * Square Online Store.
     */
    public const ONLINE_STORE = 'ONLINE_STORE';

    /**
     * Square Payroll.
     */
    public const PAYROLL = 'PAYROLL';

    /**
     * A Square product that does not match any other value.
     */
    public const OTHER = 'OTHER';

    private const _ALL_VALUES = [
        self::REGISTER,
        self::EXTERNAL_API,
        self::BILLING,
        self::APPOINTMENTS,
        self::INVOICES,
        self::ONLINE_STORE,
        self::PAYROLL,
        self::OTHER,
    ];

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
