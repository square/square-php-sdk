<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * The status of the domain registration.
 */
class RegisterDomainResponseStatus
{
    /**
     * The domain is added, but not verified.
     */
    public const PENDING = 'PENDING';

    /**
     * The domain is added and verified. It can be used to accept Apple Pay transactions.
     */
    public const VERIFIED = 'VERIFIED';

    private const _ALL_VALUES = [self::PENDING, self::VERIFIED];

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
