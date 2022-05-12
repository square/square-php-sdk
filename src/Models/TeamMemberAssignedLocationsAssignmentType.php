<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Enumerates the possible assignment types that the team member can have.
 */
class TeamMemberAssignedLocationsAssignmentType
{
    /**
     * The team member is assigned to all current and future locations. The `location_ids` field
     * is empty if the team member has this assignment type.
     */
    public const ALL_CURRENT_AND_FUTURE_LOCATIONS = 'ALL_CURRENT_AND_FUTURE_LOCATIONS';

    /**
     * The team member is assigned to an explicit subset of locations. The `location_ids` field
     * is the list of locations that the team member is assigned to.
     */
    public const EXPLICIT_LOCATIONS = 'EXPLICIT_LOCATIONS';

    private const _ALL_VALUES = [self::ALL_CURRENT_AND_FUTURE_LOCATIONS, self::EXPLICIT_LOCATIONS];

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
