<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the Square product used to generate a change.
 */
class Product
{
    /**
     * Square Point of Sale application.
     */
    public const SQUARE_POS = 'SQUARE_POS';

    /**
     * Square Connect APIs (for example, Orders API or Checkout API).
     */
    public const EXTERNAL_API = 'EXTERNAL_API';

    /**
     * A Square subscription (various products).
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
     * Square Dashboard.
     */
    public const DASHBOARD = 'DASHBOARD';

    /**
     * Item Library Import.
     */
    public const ITEM_LIBRARY_IMPORT = 'ITEM_LIBRARY_IMPORT';

    /**
     * A Square product that does not match any other value.
     */
    public const OTHER = 'OTHER';

    private const _ALL_VALUES = [
        self::SQUARE_POS,
        self::EXTERNAL_API,
        self::BILLING,
        self::APPOINTMENTS,
        self::INVOICES,
        self::ONLINE_STORE,
        self::PAYROLL,
        self::DASHBOARD,
        self::ITEM_LIBRARY_IMPORT,
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
