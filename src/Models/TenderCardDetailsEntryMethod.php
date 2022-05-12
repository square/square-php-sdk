<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the method used to enter the card's details.
 */
class TenderCardDetailsEntryMethod
{
    /**
     * The card was swiped through a Square reader or Square stand.
     */
    public const SWIPED = 'SWIPED';

    /**
     * The card information was keyed manually into Square Point of Sale or a
     * Square-hosted web form.
     */
    public const KEYED = 'KEYED';

    /**
     * The card was processed via EMV with a Square reader.
     */
    public const EMV = 'EMV';

    /**
     * The buyer's card details were already on file with Square.
     */
    public const ON_FILE = 'ON_FILE';

    /**
     * The card was processed via a contactless (i.e., NFC) transaction
     * with a Square reader.
     */
    public const CONTACTLESS = 'CONTACTLESS';

    private const _ALL_VALUES = [self::SWIPED, self::KEYED, self::EMV, self::ON_FILE, self::CONTACTLESS];

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
