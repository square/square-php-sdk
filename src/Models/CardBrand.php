<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates a card's brand, such as `VISA` or `MASTERCARD`.
 */
class CardBrand
{
    public const OTHER_BRAND = 'OTHER_BRAND';

    public const VISA = 'VISA';

    public const MASTERCARD = 'MASTERCARD';

    public const AMERICAN_EXPRESS = 'AMERICAN_EXPRESS';

    public const DISCOVER = 'DISCOVER';

    public const DISCOVER_DINERS = 'DISCOVER_DINERS';

    public const JCB = 'JCB';

    public const CHINA_UNIONPAY = 'CHINA_UNIONPAY';

    public const SQUARE_GIFT_CARD = 'SQUARE_GIFT_CARD';

    public const SQUARE_CAPITAL_CARD = 'SQUARE_CAPITAL_CARD';

    public const INTERAC = 'INTERAC';

    public const EFTPOS = 'EFTPOS';

    public const FELICA = 'FELICA';

    public const EBT = 'EBT';

    private const _ALL_VALUES = [
        self::OTHER_BRAND,
        self::VISA,
        self::MASTERCARD,
        self::AMERICAN_EXPRESS,
        self::DISCOVER,
        self::DISCOVER_DINERS,
        self::JCB,
        self::CHINA_UNIONPAY,
        self::SQUARE_GIFT_CARD,
        self::SQUARE_CAPITAL_CARD,
        self::INTERAC,
        self::EFTPOS,
        self::FELICA,
        self::EBT,
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
