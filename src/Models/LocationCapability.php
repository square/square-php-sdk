<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The capabilities a location might have.
 */
class LocationCapability
{
    /**
     * The capability to process credit card transactions with Square.
     */
    public const CREDIT_CARD_PROCESSING = 'CREDIT_CARD_PROCESSING';

    /**
     * The capability to receive automatic transfers from Square.
     */
    public const AUTOMATIC_TRANSFERS = 'AUTOMATIC_TRANSFERS';

    private const _ALL_VALUES = [self::CREDIT_CARD_PROCESSING, self::AUTOMATIC_TRANSFERS];

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
