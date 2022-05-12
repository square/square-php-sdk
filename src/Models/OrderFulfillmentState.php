<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The current state of this fulfillment.
 */
class OrderFulfillmentState
{
    /**
     * Indicates that the fulfillment has been proposed.
     */
    public const PROPOSED = 'PROPOSED';

    /**
     * Indicates that the fulfillment has been reserved.
     */
    public const RESERVED = 'RESERVED';

    /**
     * Indicates that the fulfillment has been prepared.
     */
    public const PREPARED = 'PREPARED';

    /**
     * Indicates that the fulfillment was successfully completed.
     */
    public const COMPLETED = 'COMPLETED';

    /**
     * Indicates that the fulfillment was canceled.
     */
    public const CANCELED = 'CANCELED';

    /**
     * Indicates that the fulfillment failed to be completed, but was not explicitly
     * canceled.
     */
    public const FAILED = 'FAILED';

    private const _ALL_VALUES = [
        self::PROPOSED,
        self::RESERVED,
        self::PREPARED,
        self::COMPLETED,
        self::CANCELED,
        self::FAILED,
    ];

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
