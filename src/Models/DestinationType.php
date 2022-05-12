<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * List of possible destinations against which a payout can be made.
 */
class DestinationType
{
    /**
     * An external bank account outside of Square.
     */
    public const BANK_ACCOUNT = 'BANK_ACCOUNT';

    /**
     * An external card outside of Square used for the transfer.
     */
    public const CARD = 'CARD';

    public const SQUARE_BALANCE = 'SQUARE_BALANCE';

    /**
     * Square Checking or Savings account (US), Square Card (CA), Square Current account (UK),
     * Square Compte Courant (FR), Cuenta Corriente Square (ES)
     */
    public const SQUARE_STORED_BALANCE = 'SQUARE_STORED_BALANCE';

    private const _ALL_VALUES = [self::BANK_ACCOUNT, self::CARD, self::SQUARE_BALANCE, self::SQUARE_STORED_BALANCE];

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
