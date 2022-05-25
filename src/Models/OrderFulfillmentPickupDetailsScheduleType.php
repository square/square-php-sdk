<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * The schedule type of the pickup fulfillment.
 */
class OrderFulfillmentPickupDetailsScheduleType
{
    /**
     * Indicates that the fulfillment will be picked up at a scheduled pickup time.
     */
    public const SCHEDULED = 'SCHEDULED';

    /**
     * Indicates that the fulfillment will be picked up as soon as possible and
     * should be prepared immediately.
     */
    public const ASAP = 'ASAP';

    private const _ALL_VALUES = [self::SCHEDULED, self::ASAP];

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
