<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * The days of the week.
 */
class Weekday
{
    /**
     * Monday
     */
    public const MON = 'MON';

    /**
     * Tuesday
     */
    public const TUE = 'TUE';

    /**
     * Wednesday
     */
    public const WED = 'WED';

    /**
     * Thursday
     */
    public const THU = 'THU';

    /**
     * Friday
     */
    public const FRI = 'FRI';

    /**
     * Saturday
     */
    public const SAT = 'SAT';

    /**
     * Sunday
     */
    public const SUN = 'SUN';

    private const _ALL_VALUES = [self::MON, self::TUE, self::WED, self::THU, self::FRI, self::SAT, self::SUN];

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
