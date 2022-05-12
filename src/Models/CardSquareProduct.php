<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class CardSquareProduct
{
    public const UNKNOWN_SQUARE_PRODUCT = 'UNKNOWN_SQUARE_PRODUCT';

    public const CONNECT_API = 'CONNECT_API';

    public const DASHBOARD = 'DASHBOARD';

    public const REGISTER_CLIENT = 'REGISTER_CLIENT';

    public const BUYER_DASHBOARD = 'BUYER_DASHBOARD';

    public const WEB = 'WEB';

    public const INVOICES = 'INVOICES';

    public const GIFT_CARD = 'GIFT_CARD';

    public const VIRTUAL_TERMINAL = 'VIRTUAL_TERMINAL';

    public const READER_SDK = 'READER_SDK';

    public const SQUARE_PROFILE = 'SQUARE_PROFILE';

    private const _ALL_VALUES = [
        self::UNKNOWN_SQUARE_PRODUCT,
        self::CONNECT_API,
        self::DASHBOARD,
        self::REGISTER_CLIENT,
        self::BUYER_DASHBOARD,
        self::WEB,
        self::INVOICES,
        self::GIFT_CARD,
        self::VIRTUAL_TERMINAL,
        self::READER_SDK,
        self::SQUARE_PROFILE,
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
