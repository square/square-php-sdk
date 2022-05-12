<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Types of daily appointment limits.
 */
class BusinessAppointmentSettingsMaxAppointmentsPerDayLimitType
{
    /**
     * The maximum number of daily appointments is set on a per team member basis.
     */
    public const PER_TEAM_MEMBER = 'PER_TEAM_MEMBER';

    /**
     * The maximum number of daily appointments is set on a per location basis.
     */
    public const PER_LOCATION = 'PER_LOCATION';

    private const _ALL_VALUES = [self::PER_TEAM_MEMBER, self::PER_LOCATION];

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
