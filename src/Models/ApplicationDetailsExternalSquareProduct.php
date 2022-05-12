<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * A list of products to return to external callers.
 */
class ApplicationDetailsExternalSquareProduct
{
    public const APPOINTMENTS = 'APPOINTMENTS';

    public const ECOMMERCE_API = 'ECOMMERCE_API';

    public const INVOICES = 'INVOICES';

    public const ONLINE_STORE = 'ONLINE_STORE';

    public const OTHER = 'OTHER';

    public const RESTAURANTS = 'RESTAURANTS';

    public const RETAIL = 'RETAIL';

    public const SQUARE_POS = 'SQUARE_POS';

    public const TERMINAL_API = 'TERMINAL_API';

    public const VIRTUAL_TERMINAL = 'VIRTUAL_TERMINAL';

    private const _ALL_VALUES = [
        self::APPOINTMENTS,
        self::ECOMMERCE_API,
        self::INVOICES,
        self::ONLINE_STORE,
        self::OTHER,
        self::RESTAURANTS,
        self::RETAIL,
        self::SQUARE_POS,
        self::TERMINAL_API,
        self::VIRTUAL_TERMINAL,
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
