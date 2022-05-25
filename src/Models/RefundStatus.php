<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Indicates a refund's current status.
 */
class RefundStatus
{
    /**
     * The refund is pending.
     */
    public const PENDING = 'PENDING';

    /**
     * The refund has been approved by Square.
     */
    public const APPROVED = 'APPROVED';

    /**
     * The refund has been rejected by Square.
     */
    public const REJECTED = 'REJECTED';

    /**
     * The refund failed.
     */
    public const FAILED = 'FAILED';

    private const _ALL_VALUES = [self::PENDING, self::APPROVED, self::REJECTED, self::FAILED];

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
