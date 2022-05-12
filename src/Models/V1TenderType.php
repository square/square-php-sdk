<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class V1TenderType
{
    public const CREDIT_CARD = 'CREDIT_CARD';

    public const CASH = 'CASH';

    public const THIRD_PARTY_CARD = 'THIRD_PARTY_CARD';

    public const NO_SALE = 'NO_SALE';

    public const SQUARE_WALLET = 'SQUARE_WALLET';

    public const SQUARE_GIFT_CARD = 'SQUARE_GIFT_CARD';

    public const UNKNOWN = 'UNKNOWN';

    public const OTHER = 'OTHER';

    private const _ALL_VALUES = [
        self::CREDIT_CARD,
        self::CASH,
        self::THIRD_PARTY_CARD,
        self::NO_SALE,
        self::SQUARE_WALLET,
        self::SQUARE_GIFT_CARD,
        self::UNKNOWN,
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
