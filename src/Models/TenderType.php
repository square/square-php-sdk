<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates a tender's type.
 */
class TenderType
{
    /**
     * A credit card.
     */
    public const CARD = 'CARD';

    /**
     * Cash.
     */
    public const CASH = 'CASH';

    /**
     * A credit card processed with a card processor other than Square.
     *
     * This value applies only to merchants in countries where Square does not
     * yet provide card processing.
     */
    public const THIRD_PARTY_CARD = 'THIRD_PARTY_CARD';

    /**
     * A Square gift card.
     */
    public const SQUARE_GIFT_CARD = 'SQUARE_GIFT_CARD';

    /**
     * This tender represents the register being opened for a "no sale" event.
     */
    public const NO_SALE = 'NO_SALE';

    /**
     * A payment from a digital wallet, e.g. Cash App.
     *
     * Note: Some "digital wallets", including Google Pay and Apple Pay, facilitate
     * card payments.  Those payments have the `CARD` type.
     */
    public const WALLET = 'WALLET';

    /**
     * A form of tender that does not match any other value.
     */
    public const OTHER = 'OTHER';

    private const _ALL_VALUES = [
        self::CARD,
        self::CASH,
        self::THIRD_PARTY_CARD,
        self::SQUARE_GIFT_CARD,
        self::NO_SALE,
        self::WALLET,
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
