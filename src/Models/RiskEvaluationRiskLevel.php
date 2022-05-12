<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class RiskEvaluationRiskLevel
{
    /**
     * Indicates Square is still evaluating the payment.
     */
    public const PENDING = 'PENDING';

    /**
     * Indicates payment risk is within the normal range.
     */
    public const NORMAL = 'NORMAL';

    /**
     * Indicates elevated risk level associated with the payment.
     */
    public const MODERATE = 'MODERATE';

    /**
     * Indicates significantly elevated risk level with the payment.
     */
    public const HIGH = 'HIGH';

    private const _ALL_VALUES = [self::PENDING, self::NORMAL, self::MODERATE, self::HIGH];

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
