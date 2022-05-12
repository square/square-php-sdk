<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the financial purpose of the bank account.
 */
class BankAccountType
{
    /**
     * An account at a financial institution against which checks can be
     * drawn by the account depositor.
     */
    public const CHECKING = 'CHECKING';

    /**
     * An account at a financial institution that pays interest but cannot be
     * used directly as money in the narrow sense of a medium of exchange.
     */
    public const SAVINGS = 'SAVINGS';

    /**
     * An account at a financial institution that contains a deposit of funds
     * and/or securities.
     */
    public const INVESTMENT = 'INVESTMENT';

    /**
     * An account at a financial institution which cannot be described by the
     * other types.
     */
    public const OTHER = 'OTHER';

    /**
     * An account at a financial institution against which checks can be
     * drawn specifically for business purposes (non-personal use).
     */
    public const BUSINESS_CHECKING = 'BUSINESS_CHECKING';

    private const _ALL_VALUES = [self::CHECKING, self::SAVINGS, self::INVESTMENT, self::OTHER, self::BUSINESS_CHECKING];

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
