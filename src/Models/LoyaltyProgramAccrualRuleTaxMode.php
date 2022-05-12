<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates how taxes should be treated when calculating the purchase amount used for loyalty points
 * accrual.
 * This setting applies only to `SPEND` accrual rules or `VISIT` accrual rules that have a minimum
 * spend requirement.
 */
class LoyaltyProgramAccrualRuleTaxMode
{
    /**
     * Exclude taxes from the purchase amount used for loyalty points accrual.
     */
    public const BEFORE_TAX = 'BEFORE_TAX';

    /**
     * Include taxes in the purchase amount used for loyalty points accrual.
     */
    public const AFTER_TAX = 'AFTER_TAX';

    private const _ALL_VALUES = [self::BEFORE_TAX, self::AFTER_TAX];

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
