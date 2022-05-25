<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * DeviceCode.Status enum.
 */
class DeviceCodeStatus
{
    /**
     * The status cannot be determined or does not exist.
     */
    public const UNKNOWN = 'UNKNOWN';

    /**
     * The device code is just created and unpaired.
     */
    public const UNPAIRED = 'UNPAIRED';

    /**
     * The device code has been signed in and paired to a device.
     */
    public const PAIRED = 'PAIRED';

    /**
     * The device code was unpaired and expired before it was paired.
     */
    public const EXPIRED = 'EXPIRED';

    private const _ALL_VALUES = [self::UNKNOWN, self::UNPAIRED, self::PAIRED, self::EXPIRED];

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
