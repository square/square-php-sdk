<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * The current state of a cash drawer shift.
 */
class CashDrawerShiftState
{
    /**
     * An open cash drawer shift.
     */
    public const OPEN = 'OPEN';

    /**
     * A cash drawer shift that is ended but has not yet had an employee content audit.
     */
    public const ENDED = 'ENDED';

    /**
     * An ended cash drawer shift that is closed with a completed employee
     * content audit and recorded result.
     */
    public const CLOSED = 'CLOSED';

    private const _ALL_VALUES = [self::OPEN, self::ENDED, self::CLOSED];

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
