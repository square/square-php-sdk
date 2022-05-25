<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Enumerates the possible statuses the team member can have within a business.
 */
class TeamMemberStatus
{
    /**
     * The team member can sign in to Point of Sale and the Seller Dashboard.
     */
    public const ACTIVE = 'ACTIVE';

    /**
     * The team member can no longer sign in to Point of Sale or the Seller Dashboard,
     * but the team member's sales reports remain available.
     */
    public const INACTIVE = 'INACTIVE';

    private const _ALL_VALUES = [self::ACTIVE, self::INACTIVE];

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
