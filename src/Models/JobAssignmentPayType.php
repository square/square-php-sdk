<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Enumerates the possible pay types that a job can be assigned.
 */
class JobAssignmentPayType
{
    /**
     * The job does not have a defined pay type.
     */
    public const NONE = 'NONE';

    /**
     * The job pays an hourly rate.
     */
    public const HOURLY = 'HOURLY';

    /**
     * The job pays an annual salary.
     */
    public const SALARY = 'SALARY';

    private const _ALL_VALUES = [self::NONE, self::HOURLY, self::SALARY];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|stdClass|null|string $value Value or a list/map of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        $value = json_decode(json_encode($value), true); // converts stdClass into array
        ApiHelper::checkValueInEnum($value, self::class, self::_ALL_VALUES);
        return $value;
    }
}
