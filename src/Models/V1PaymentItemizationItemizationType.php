<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class V1PaymentItemizationItemizationType
{
    public const ITEM = 'ITEM';

    public const CUSTOM_AMOUNT = 'CUSTOM_AMOUNT';

    public const GIFT_CARD_ACTIVATION = 'GIFT_CARD_ACTIVATION';

    public const GIFT_CARD_RELOAD = 'GIFT_CARD_RELOAD';

    public const GIFT_CARD_UNKNOWN = 'GIFT_CARD_UNKNOWN';

    public const OTHER = 'OTHER';

    private const _ALL_VALUES = [
        self::ITEM,
        self::CUSTOM_AMOUNT,
        self::GIFT_CARD_ACTIVATION,
        self::GIFT_CARD_RELOAD,
        self::GIFT_CARD_UNKNOWN,
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
