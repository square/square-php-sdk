<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Enumerates the possible invitation statuses the team member can have within a business.
 */
class TeamMemberInvitationStatus
{
    /**
     * The team member has not received an invitation.
     */
    public const UNINVITED = 'UNINVITED';

    /**
     * The team member has received an invitation, but had not accepted it.
     */
    public const PENDING = 'PENDING';

    /**
     * The team member has both received and accepted an invitation.
     */
    public const ACCEPTED = 'ACCEPTED';

    private const _ALL_VALUES = [self::UNINVITED, self::PENDING, self::ACCEPTED];

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
