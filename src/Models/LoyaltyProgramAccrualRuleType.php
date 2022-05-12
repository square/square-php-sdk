<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The type of the accrual rule that defines how buyers can earn points.
 */
class LoyaltyProgramAccrualRuleType
{
    /**
     * A visit-based accrual rule. A buyer earns points for each visit.
     * You can specify the minimum purchase required.
     */
    public const VISIT = 'VISIT';

    /**
     * A spend-based accrual rule. A buyer earns points based on the amount
     * spent.
     */
    public const SPEND = 'SPEND';

    /**
     * An accrual rule based on an item variation. For example, accrue
     * points for purchasing a coffee.
     */
    public const ITEM_VARIATION = 'ITEM_VARIATION';

    /**
     * An accrual rule based on an item category. For example, accrue points
     * for purchasing any item in the "hot drink" category: coffee, tea, or hot cocoa.
     */
    public const CATEGORY = 'CATEGORY';

    private const _ALL_VALUES = [self::VISIT, self::SPEND, self::ITEM_VARIATION, self::CATEGORY];

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
